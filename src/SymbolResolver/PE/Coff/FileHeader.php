<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE\Coff;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * @psalm-import-type MachineType from Machine
 * @psalm-import-type CharacteristicsType from Characteristics
 */
final class FileHeader
{
    /**
     * @var MachineType
     */
    #[ExpectedValues(valuesFromClass: Machine::class)]
    public int $machine = 0;

    /**
     * @var positive-int|0
     */
    public int $numberOfSections = 0;

    /**
     * @var \DateTimeInterface
     */
    public \DateTimeInterface $timestamp;

    /**
     * @var positive-int|0
     */
    public int $pointerToSymbolTable = 0;

    /**
     * @var positive-int|0
     */
    public int $numberOfSymbols = 0;

    /**
     * @var positive-int|0
     */
    public int $sizeOfOptionalHeader = 0;

    /**
     * @var array<CharacteristicsType|0, bool>
     */
    public array $characteristics = [
        0 => false,
        Characteristics::IMAGE_FILE_RELOCS_STRIPPED => false,
        Characteristics::IMAGE_FILE_EXECUTABLE_IMAGE => false,
        Characteristics::IMAGE_FILE_LINE_NUMS_STRIPPED => false,

        Characteristics::IMAGE_FILE_LOCAL_SYMS_STRIPPED => false,
        Characteristics::IMAGE_FILE_AGGRESIVE_WS_TRIM => false,
        Characteristics::IMAGE_FILE_LARGE_ADDRESS_AWARE => false,
        Characteristics::IMAGE_FILE_BYTES_REVERSED_LO => false,

        Characteristics::IMAGE_FILE_32BIT_MACHINE => false,
        Characteristics::IMAGE_FILE_DEBUG_STRIPPED => false,
        Characteristics::IMAGE_FILE_REMOVABLE_RUN_FROM_SWAP => false,
        Characteristics::IMAGE_FILE_NET_RUN_FROM_SWAP => false,

        Characteristics::IMAGE_FILE_SYSTEM => false,
        Characteristics::IMAGE_FILE_DLL => false,
        Characteristics::IMAGE_FILE_UP_SYSTEM_ONLY => false,
        Characteristics::IMAGE_FILE_BYTES_REVERSED_HI => false,
    ];

    /**
     * FileHeader constructor.
     */
    public function __construct()
    {
        $this->timestamp = (new \DateTimeImmutable())->setTimestamp(0);
    }
}
