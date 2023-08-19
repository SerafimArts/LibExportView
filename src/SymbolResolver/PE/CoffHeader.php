<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE;

use JetBrains\PhpStorm\ExpectedValues;
use Serafim\LibExportView\SymbolResolver\PE\Coff\FileHeader;
use Serafim\LibExportView\SymbolResolver\PE\OptionalHeader\OptionalHeader32;
use Serafim\LibExportView\SymbolResolver\PE\OptionalHeader\OptionalHeader64;

/**
 * @psalm-import-type SignatureType from Signature
 */
final class CoffHeader
{
    /**
     * The file can be identified by the ASCII string "MZ" (hexadecimal: 4D 5A)
     * at the beginning of the file (the "magic number").
     *
     * @var SignatureType
     */
    #[ExpectedValues(valuesFromClass: Signature::class)]
    public int $signature = Signature::IMAGE_NT_SIGNATURE;

    /**
     * @var FileHeader
     */
    public FileHeader $fileHeader;

    /**
     * @var OptionalHeader32|OptionalHeader64
     */
    public object $optionalHeader;

    /**
     * Header constructor.
     */
    public function __construct()
    {
        $this->fileHeader = new FileHeader();
        $this->optionalHeader = new OptionalHeader64();
    }
}
