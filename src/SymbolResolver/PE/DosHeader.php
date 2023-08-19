<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * @psalm-import-type SignatureType from Signature
 */
final class DosHeader
{
    /**
     * The file can be identified by the ASCII string "MZ" (hexadecimal: 4D 5A)
     * at the beginning of the file (the "magic number").
     *
     * @var SignatureType
     */
    #[ExpectedValues(valuesFromClass: Signature::class)]
    public int $signature = Signature::IMAGE_DOS_SIGNATURE;

    /**
     * Bytes on last page of file
     *
     * @var positive-int|0
     */
    public int $usedBytesInTheLastPage = 0;

    /**
     * Pages in file
     *
     * @var positive-int|0
     */
    public int $fileSizeInPages = 0;

    /**
     * Relocations
     *
     * @var positive-int|0
     */
    public int $numberOfRelocationItems = 0;

    /**
     * Size of header in paragraphs
     *
     * @var positive-int|0
     */
    public int $headerSizeInParagraphs = 0;

    /**
     * Minimum extra paragraphs needed
     *
     * @var positive-int|0
     */
    public int $minimumExtraParagraphs = 0;

    /**
     * Maximum extra paragraphs needed
     *
     * @var positive-int|0
     */
    public int $maximumExtraParagraphs = 0;

    /**
     * Initial (relative) SS value
     *
     * @var positive-int|0
     */
    public int $initialRelativeSS = 0;

    /**
     * Initial SP value
     *
     * @var positive-int|0
     */
    public int $initialSP = 0;

    /**
     * Checksum
     *
     * @var positive-int|0
     */
    public int $checksum = 0;

    /**
     * Initial IP value
     *
     * @var positive-int|0
     */
    public int $initialIP = 0;

    /**
     * Initial (relative) CS value
     *
     * @var positive-int|0
     */
    public int $initialRelativeCS = 0;

    /**
     * File address of relocation table
     *
     * @var positive-int|0
     */
    public int $addressOfRelocationTable = 0;

    /**
     * Overlay number
     *
     * @var positive-int|0
     */
    public int $overlayNumber = 0;

    /**
     * Reserved words
     *
     * @var array<positive-int|0>
     */
    public array $reserved = [0, 0, 0, 0];

    /**
     * OEM identifier (for {@see DosHeader::$oemInfo})
     *
     * @var positive-int|0
     */
    public int $oemIdentifier = 0;

    /**
     * OEM information
     *
     * @var positive-int|0
     */
    public int $oemInfo = 0;

    /**
     * Reserved words
     *
     * @var array<positive-int|0>
     */
    public array $reserved2 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    /**
     * NtHeader Offset
     *
     * @var int
     */
    public int $addressOfNewExeHeader = 0;
}
