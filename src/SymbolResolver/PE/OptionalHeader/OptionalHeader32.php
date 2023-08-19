<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE\OptionalHeader;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * @psalm-import-type SignatureType from OptionalHeaderSignature
 * @psalm-import-type SubsystemType from Subsystem
 * @psalm-import-type DllCharacteristicsType from DllCharacteristics
 */
final class OptionalHeader32
{
    /**
     * The unsigned integer that identifies the state of the image file.
     * The most common number is 0x10B, which identifies it as a normal
     * executable file. 0x107 identifies it as a ROM image, and 0x20B
     * identifies it as a PE32+ executable.
     *
     * @var SignatureType
     */
    #[ExpectedValues(valuesFromClass: OptionalHeaderSignature::class)]
    public int $magic = OptionalHeaderSignature::PE32;

    /**
     * The linker major version number.
     *
     * @var positive-int|0
     */
    public int $majorLinkerVersion = 0;

    /**
     * The linker minor version number.
     *
     * @var positive-int|0
     */
    public int $minorLinkerVersion = 0;

    /**
     * The size of the code (text) section, or the sum of all code sections if
     * there are multiple sections.
     *
     * @var positive-int|0
     */
    public int $sizeOfCode = 0;

    /**
     * The size of the initialized data section, or the sum of all such
     * sections if there are multiple data sections.
     *
     * @var positive-int|0
     */
    public int $sizeOfInitializedData = 0;

    /**
     * The size of the uninitialized data section (BSS), or the sum of all
     * such sections if there are multiple BSS sections.
     *
     * @var positive-int|0
     */
    public int $sizeOfUninitializedData = 0;

    /**
     * The address of the entry point relative to the image base when the
     * executable file is loaded into memory. For program images, this is the
     * starting address. For device drivers, this is the address of the
     * initialization function.
     *
     * An entry point is optional for DLLs. When no entry point is present,
     * this field must be zero.
     *
     * @var positive-int|0
     */
    public int $addressOfEntryPoint = 0;

    /**
     * The address that is relative to the image base of the beginning-of-code
     * section when it is loaded into memory.
     *
     * @var positive-int|0
     */
    public int $baseOfCode = 0;

    /**
     * The address that is relative to the image base of the beginning-of-data
     * section when it is loaded into memory.
     *
     * @var positive-int|0
     */
    public int $baseOfData = 0;

    /**
     * The preferred address of the first byte of image when loaded into memory;
     * must be a multiple of 64K.
     *
     * - The default for DLLs is 0x10000000.
     * - The default for Windows CE EXEs is 0x00010000.
     * - The default for Windows NT, Windows 2000, Windows XP, Windows 95,
     *      Windows 98, and Windows Me is 0x00400000.
     *
     * @var positive-int|0
     */
    public int $imageBase = 0x00400000;

    /**
     * The alignment (in bytes) of sections when they are loaded into memory.
     * It must be greater than or equal to FileAlignment. The default is the
     * page size for the architecture.
     *
     * @var positive-int|0
     */
    public int $sectionAlignment = 0;

    /**
     * The alignment factor (in bytes) that is used to align the raw data of
     * sections in the image file. The value should be a power of 2 between
     * 512 and 64K, inclusive. The default is 512.
     *
     * If the SectionAlignment is less than the architecture's page size,
     * then FileAlignment must match SectionAlignment.
     *
     * @var positive-int|0
     */
    public int $fileAlignment = 512;

    /**
     * The major version number of the required operating system.
     *
     * @var positive-int|0
     */
    public int $majorOperatingSystemVersion = 0;

    /**
     * The minor version number of the required operating system.
     *
     * @var positive-int|0
     */
    public int $minorOperatingSystemVersion = 0;

    /**
     * The major version number of the image.
     *
     * @var positive-int|0
     */
    public int $majorImageVersion = 0;

    /**
     * The minor version number of the image.
     *
     * @var positive-int|0
     */
    public int $minorImageVersion = 0;

    /**
     * The major version number of the subsystem.
     *
     * @var positive-int|0
     */
    public int $majorSubsystemVersion = 0;

    /**
     * The minor version number of the subsystem.
     *
     * @var positive-int|0
     */
    public int $minorSubsystemVersion = 0;

    /**
     * Reserved, must be zero.
     *
     * @var positive-int|0
     */
    public int $win32VersionValue = 0;

    /**
     * The size (in bytes) of the image, including all headers, as the image
     * is loaded in memory. It must be a multiple of SectionAlignment.
     *
     * @var positive-int|0
     */
    public int $sizeOfImage = 0;

    /**
     * The combined size of an MS-DOS stub, PE header, and section headers
     * rounded up to a multiple of FileAlignment.
     *
     * @var positive-int|0
     */
    public int $sizeOfHeaders = 0;

    /**
     * The image file checksum. The algorithm for computing the checksum is
     * incorporated into IMAGHELP.DLL. The following are checked for validation
     * at load time: all drivers, any DLL loaded at boot time, and any DLL
     * that is loaded into a critical Windows process.
     *
     * @var positive-int|0
     */
    public int $checkSum = 0;

    /**
     * The subsystem that is required to run this image.
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#windows-subsystem
     *
     * @var SubsystemType
     */
    #[ExpectedValues(valuesFromClass: Subsystem::class)]
    public int $subsystem = Subsystem::IMAGE_SUBSYSTEM_UNKNOWN;

    /**
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#dll-characteristics
     *
     * @var array<DllCharacteristicsType|0|1|2|3, bool>
     */
    public array $dllCharacteristics = [
        0 => false,
        1 => false,
        2 => false,
        3 => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_HIGH_ENTROPY_VA => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_DYNAMIC_BASE => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_FORCE_INTEGRITY => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_NX_COMPAT => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_NO_ISOLATION => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_NO_SEH => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_NO_BIND => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_APPCONTAINER => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_WDM_DRIVER => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_GUARD_CF => false,
        DllCharacteristics::IMAGE_DLLCHARACTERISTICS_TERMINAL_SERVER_AWARE => false,
    ];

    /**
     * The size of the stack to reserve. Only SizeOfStackCommit is committed;
     * the rest is made available one page at a time until the reserve size
     * is reached.
     *
     * @var positive-int|0
     */
    public int $sizeOfStackReserve = 0;

    /**
     * The size of the stack to commit.
     *
     * @var positive-int|0
     */
    public int $sizeOfStackCommit = 0;

    /**
     * The size of the local heap space to reserve. Only SizeOfHeapCommit is
     * committed; the rest is made available one page at a time until the
     * reserve size is reached.
     *
     * @var positive-int|0
     */
    public int $sizeOfHeapReserve = 0;

    /**
     * The size of the local heap space to commit.
     *
     * @var positive-int|0
     */
    public int $sizeOfHeapCommit = 0;

    /**
     * Reserved, must be zero.
     *
     * @var positive-int|0
     */
    public int $loaderFlags = 0;

    /**
     * The number of data-directory entries in the remainder of the optional
     * header. Each describes a location and size.
     *
     * @var positive-int|0
     */
    public int $numberOfRvaAndSizes = 0;

    /**
     * Optional header data directories.
     *
     * Depends on {@see OptionalHeader64::$numberOfRvaAndSizes} value.
     *
     * @var DataDirectories
     */
    public DataDirectories $dataDirectories;

    /**
     * OptionalHeader64 constructor.
     */
    public function __construct()
    {
        $this->dataDirectories = new DataDirectories();
    }
}
