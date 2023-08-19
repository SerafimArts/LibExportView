<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver;

use Serafim\LibExportView\SymbolResolver\Exception\ResolverException;
use Serafim\LibExportView\SymbolResolver\PE\Coff\FileHeader;
use Serafim\LibExportView\SymbolResolver\PE\CoffHeader;
use Serafim\LibExportView\SymbolResolver\PE\DosHeader;
use Serafim\LibExportView\SymbolResolver\PE\ExportDirectory;
use Serafim\LibExportView\SymbolResolver\PE\OptionalHeader\DataDirectories;
use Serafim\LibExportView\SymbolResolver\PE\OptionalHeader\DataDirectory;
use Serafim\LibExportView\SymbolResolver\PE\OptionalHeader\OptionalHeader32;
use Serafim\LibExportView\SymbolResolver\PE\OptionalHeader\OptionalHeader64;
use Serafim\LibExportView\SymbolResolver\PE\OptionalHeader\OptionalHeaderSignature;
use Serafim\LibExportView\SymbolResolver\PE\SectionHeader;
use Serafim\LibExportView\SymbolResolver\PE\SectionHeaders;
use Serafim\LibExportView\SymbolResolver\PE\Signature;
use Serafim\LibExportView\SymbolResolver\Stream\TypedStream;
use JetBrains\PhpStorm\NoReturn;

final class PEResolver extends Resolver
{
    /**
     * @var DosHeader
     * @psalm-readonly
     */
    public DosHeader $dos;

    /**
     * @var CoffHeader
     * @psalm-readonly
     */
    public CoffHeader $coff;

    /**
     * @var SectionHeaders
     * @psalm-readonly
     */
    public SectionHeaders $sections;

    /**
     * @var ExportDirectory
     * @psalm-readonly
     */
    public ExportDirectory $eat;

    /**
     * @param TypedStream $stream
     * @throws ResolverException
     */
    public function __construct(TypedStream $stream)
    {
        $stream = $stream->withLittleEndian();

        // Read MS DOS header
        $this->dos = $this->readDosHeader($stream);

        // Seek to NT header
        $stream->seek($this->dos->addressOfNewExeHeader);

        // Read NT header
        $this->coff = $this->readCoffHeader($stream);

        // Read Section headers
        $this->sections = new SectionHeaders();
        for ($i = 0; $i < $this->coff->fileHeader->numberOfSections; ++$i) {
            $this->sections->add($this->readSectionHeader($stream));
        }

        // Read EAT
        $this->eat = $this->readExportDirectory($stream);
    }

    /**
     * @param TypedStream $stream
     * @return DosHeader
     * @throws ResolverException
     * @psalm-suppress PropertyTypeCoercion
     * @psalm-suppress MixedPropertyTypeCoercion
     * @psalm-suppress InvalidPropertyAssignmentValue
     */
    private function readDosHeader(TypedStream $stream): DosHeader
    {
        $dos = new DosHeader();
        $dos->signature = $stream->uint16();
        $dos->usedBytesInTheLastPage = $stream->uint16();
        $dos->fileSizeInPages = $stream->uint16();
        $dos->numberOfRelocationItems = $stream->uint16();
        $dos->headerSizeInParagraphs = $stream->uint16();
        $dos->minimumExtraParagraphs = $stream->uint16();
        $dos->maximumExtraParagraphs = $stream->uint16();
        $dos->initialRelativeSS = $stream->uint16();
        $dos->initialSP = $stream->uint16();
        $dos->checksum = $stream->uint16();
        $dos->initialIP = $stream->uint16();
        $dos->initialRelativeCS = $stream->uint16();
        $dos->addressOfRelocationTable = $stream->uint16();
        $dos->overlayNumber = $stream->uint16();
        $dos->reserved = $stream->array(4, Type::TYPE_UINT16_LE);
        $dos->oemIdentifier = $stream->uint16();
        $dos->oemInfo = $stream->uint16();
        $dos->reserved2 = $stream->array(10, Type::TYPE_UINT16_LE);
        $dos->addressOfNewExeHeader = $stream->int32();

        if ($dos->signature !== Signature::IMAGE_DOS_SIGNATURE) {
            $this->error('Invalid DOS signature (0x%X)', $dos->signature);
        }

        if ($dos->addressOfNewExeHeader <= 0) {
            $this->error('Invalid AddressOfNewExeHeader (0x%X)', $dos->addressOfNewExeHeader);
        }

        return $dos;
    }

    /**
     * @param string $message
     * @param mixed ...$args
     * @throws ResolverException
     */
    #[NoReturn]
    private function error(string $message, ...$args): void
    {
        throw new ResolverException(\vsprintf($message, $args));
    }

    /**
     * @param TypedStream $stream
     * @return CoffHeader
     * @throws ResolverException
     * @psalm-suppress InvalidPropertyAssignmentValue
     * @psalm-suppress ArgumentTypeCoercion
     */
    private function readCoffHeader(TypedStream $stream): CoffHeader
    {
        $coff = new CoffHeader();
        $coff->signature = $stream->uint32();
        $coff->fileHeader = $this->readFileHeader($stream);

        if ($coff->signature !== Signature::IMAGE_NT_SIGNATURE) {
            $this->error('Invalid NT signature (0x%X)', $coff->signature);
        }

        $coff->optionalHeader = $this->readOptionalHeader($stream);
        $coff->optionalHeader->dataDirectories = $this->readDataDirectories(
            $stream->slice($coff->optionalHeader->numberOfRvaAndSizes * 8)
        );

        return $coff;
    }

    /**
     * @param TypedStream $stream
     * @return FileHeader
     * @psalm-suppress PropertyTypeCoercion
     * @psalm-suppress MixedPropertyTypeCoercion
     */
    private function readFileHeader(TypedStream $stream): FileHeader
    {
        $fileHeader = new FileHeader();
        $fileHeader->machine = $stream->uint16();
        $fileHeader->numberOfSections = $stream->uint16();
        $fileHeader->timestamp = $stream->timestamp();
        $fileHeader->pointerToSymbolTable = $stream->uint32();
        $fileHeader->numberOfSymbols = $stream->uint32();
        $fileHeader->sizeOfOptionalHeader = $stream->uint16();
        $fileHeader->characteristics = $stream->bitmask(Type::size(Type::TYPE_UINT16_LE));

        return $fileHeader;
    }

    /**
     * @param TypedStream $stream
     * @return object<OptionalHeader32|OptionalHeader64>
     * @throws ResolverException
     */
    private function readOptionalHeader(TypedStream $stream): object
    {
        switch ($stream->lookahead(fn() => $stream->uint16())) {
            case OptionalHeaderSignature::PE32:
                return $this->readOptionalHeader32($stream);

            case OptionalHeaderSignature::PE64:
                return $this->readOptionalHeader64($stream);

            case OptionalHeaderSignature::ROM:
                throw new ResolverException(\vsprintf('Unsupported ROM optional header (0x%X).', [
                    OptionalHeaderSignature::ROM,
                ]));

            default:
                throw new ResolverException(\vsprintf('Invalid or unsupported optional header signature (0x%X).', [
                    OptionalHeaderSignature::ROM,
                ]));
        }
    }

    /**
     * @param TypedStream $stream
     * @return OptionalHeader32
     * @psalm-suppress InvalidPropertyAssignmentValue
     * @psalm-suppress PropertyTypeCoercion
     * @psalm-suppress MixedPropertyTypeCoercion
     */
    private function readOptionalHeader32(TypedStream $stream): OptionalHeader32
    {
        $header = new OptionalHeader32();
        $header->magic = $stream->uint16();
        $header->majorLinkerVersion = $stream->uint8();
        $header->minorLinkerVersion = $stream->uint8();
        $header->sizeOfCode = $stream->uint32();
        $header->sizeOfInitializedData = $stream->uint32();
        $header->sizeOfUninitializedData = $stream->uint32();
        $header->addressOfEntryPoint = $stream->uint32();
        $header->baseOfCode = $stream->uint32();
        $header->baseOfData = $stream->uint32();
        $header->imageBase = $stream->uint32();
        $header->sectionAlignment = $stream->uint32();
        $header->fileAlignment = $stream->uint32();
        $header->majorOperatingSystemVersion = $stream->uint16();
        $header->minorOperatingSystemVersion = $stream->uint16();
        $header->majorImageVersion = $stream->uint16();
        $header->minorImageVersion = $stream->uint16();
        $header->majorSubsystemVersion = $stream->uint16();
        $header->minorSubsystemVersion = $stream->uint16();
        $header->win32VersionValue = $stream->uint32();
        $header->sizeOfImage = $stream->uint32();
        $header->sizeOfHeaders = $stream->uint32();
        $header->checkSum = $stream->uint32();
        $header->subsystem = $stream->uint16();
        $header->dllCharacteristics = $stream->bitmask(Type::size(Type::TYPE_UINT16_LE));
        $header->sizeOfStackReserve = $stream->uint32();
        $header->sizeOfStackCommit = $stream->uint32();
        $header->sizeOfHeapReserve = $stream->uint32();
        $header->sizeOfHeapCommit = $stream->uint32();
        $header->loaderFlags = $stream->uint32();
        $header->numberOfRvaAndSizes = $stream->uint32();

        return $header;
    }

    /**
     * @param TypedStream $stream
     * @return OptionalHeader64
     * @psalm-suppress PropertyTypeCoercion
     * @psalm-suppress MixedPropertyTypeCoercion
     * @psalm-suppress InvalidPropertyAssignmentValue
     */
    private function readOptionalHeader64(TypedStream $stream): OptionalHeader64
    {
        $header = new OptionalHeader64();
        $header->magic = $stream->uint16();
        $header->majorLinkerVersion = $stream->uint8();
        $header->minorLinkerVersion = $stream->uint8();
        $header->sizeOfCode = $stream->uint32();
        $header->sizeOfInitializedData = $stream->uint32();
        $header->sizeOfInitializedData = $stream->uint32();
        $header->addressOfEntryPoint = $stream->uint32();
        $header->baseOfCode = $stream->uint32();
        $header->imageBase = $stream->uint64();
        $header->sectionAlignment = $stream->uint32();
        $header->fileAlignment = $stream->uint32();
        $header->majorOperatingSystemVersion = $stream->uint16();
        $header->minorOperatingSystemVersion = $stream->uint16();
        $header->majorImageVersion = $stream->uint16();
        $header->minorImageVersion = $stream->uint16();
        $header->majorSubsystemVersion = $stream->uint16();
        $header->minorSubsystemVersion = $stream->uint16();
        $header->win32VersionValue = $stream->uint32();
        $header->sizeOfImage = $stream->uint32();
        $header->sizeOfHeaders = $stream->uint32();
        $header->checkSum = $stream->uint32();
        $header->subsystem = $stream->uint16();
        $header->dllCharacteristics = $stream->bitmask(Type::size(Type::TYPE_UINT16_LE));
        $header->sizeOfStackReserve = $stream->uint64();
        $header->sizeOfStackCommit = $stream->uint64();
        $header->sizeOfHeapReserve = $stream->uint64();
        $header->sizeOfHeapCommit = $stream->uint64();
        $header->loaderFlags = $stream->uint32();
        $header->numberOfRvaAndSizes = $stream->uint32();

        return $header;
    }

    /**
     * @param TypedStream $stream
     * @return DataDirectories
     */
    private function readDataDirectories(TypedStream $stream): DataDirectories
    {
        $dataDirectories = new DataDirectories();

        $dataDirectories->export = $this->readDataDirectory($stream);
        $dataDirectories->import = $this->readDataDirectory($stream);
        $dataDirectories->resource = $this->readDataDirectory($stream);
        $dataDirectories->exception = $this->readDataDirectory($stream);
        $dataDirectories->security = $this->readDataDirectory($stream);
        $dataDirectories->baseRelocationTable = $this->readDataDirectory($stream);
        $dataDirectories->debugDirectory = $this->readDataDirectory($stream);
        $dataDirectories->copyrightOrArchitectureSpecificData = $this->readDataDirectory($stream);
        $dataDirectories->globalPtr = $this->readDataDirectory($stream);
        $dataDirectories->tlsDirectory = $this->readDataDirectory($stream);
        $dataDirectories->loadConfigurationDirectory = $this->readDataDirectory($stream);
        $dataDirectories->boundImportDirectory = $this->readDataDirectory($stream);
        $dataDirectories->importAddressTable = $this->readDataDirectory($stream);
        $dataDirectories->delayLoadImportDescriptors = $this->readDataDirectory($stream);
        $dataDirectories->comRuntimeDescriptor = $this->readDataDirectory($stream);
        $dataDirectories->reserved = $this->readDataDirectory($stream);

        return $dataDirectories;
    }

    /**
     * @param TypedStream $stream
     * @return DataDirectory
     */
    private function readDataDirectory(TypedStream $stream): DataDirectory
    {
        $dataDirectory = new DataDirectory();

        $dataDirectory->virtualAddress = $stream->uint32();
        $dataDirectory->size = $stream->uint32();

        return $dataDirectory;
    }

    /**
     * @param TypedStream $stream
     * @return SectionHeader
     * @psalm-suppress MixedPropertyTypeCoercion
     */
    private function readSectionHeader(TypedStream $stream): SectionHeader
    {
        $section = new SectionHeader();

        $section->name = $stream->string(8);
        $section->misc = $stream->uint32();
        $section->virtualAddress = $stream->uint32();
        $section->sizeOfRawData = $stream->uint32();
        $section->pointerToRawData = $stream->uint32();
        $section->pointerToRelocations = $stream->uint32();
        $section->pointerToLineNumbers = $stream->uint32();
        $section->numberOfRelocations = $stream->uint16();
        $section->numberOfLineNumbers = $stream->uint16();
        $section->characteristics = $stream->bitmask(Type::size(Type::TYPE_UINT32_LE));

        return $section;
    }

    /**
     * @return bool
     */
    public function hasExportDirectory(): bool
    {
        return $this->coff->optionalHeader->dataDirectories->export->virtualAddress !== 0
            && $this->coff->optionalHeader->dataDirectories->export->size !== 0;
    }

    /**
     * @param TypedStream $stream
     * @return ExportDirectory
     * @throws ResolverException
     */
    private function readExportDirectory(TypedStream $stream): ExportDirectory
    {
        $eat = new ExportDirectory();

        if (! $this->hasExportDirectory()) {
            return $eat;
        }

        $stream->seek($this->sections->virtualAddressToPhysicalOrFail(
            $this->coff->optionalHeader->dataDirectories->export->virtualAddress
        ));

        $eat->characteristics = $stream->uint32();
        $eat->timeDateStamp = $stream->timestamp();
        $eat->majorVersion = $stream->uint16();
        $eat->minorVersion = $stream->uint16();
        $eat->name = $stream->uint32();
        $eat->base = $stream->uint32();
        $eat->numberOfFunctions = $stream->uint32();
        $eat->numberOfNames = $stream->uint32();
        $eat->addressOfFunctions = $stream->uint32();
        $eat->addressOfNames = $stream->uint32();
        $eat->addressOfNameOrdinals = $stream->uint32();

        // Fetch initial names address
        $nameArrayAddress = $this->sections->virtualAddressToPhysicalOrFail(
            $eat->addressOfNames
        );

        for ($i = 0; $i < $eat->numberOfNames; ++$i) {
            $stream->seek($nameArrayAddress + $i * 4);

            // Move to export function name address
            $stream->seek($address = $this->sections->virtualAddressToPhysicalOrFail(
                $stream->uint32(),
            ));

            $name = $stream->string();

            if ($name === '') {
                throw new ResolverException('Jump names not supported yet');
            }

            $eat->functions[] = new ExportFunction(
                name: $name,
                addr: $address,
            );
        }

        return $eat;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->eat->functions);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return \count($this->eat->functions);
    }

    /**
     * {@inheritDoc}
     */
    public function exists(string $function): bool
    {
        return \in_array($function, $this->eat->functions, true);
    }
}
