<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE\Coff;

/**
 * @psalm-type CharacteristicsType = Characteristics::IMAGE_FILE_*
 */
final class Characteristics
{
    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_RELOCS_STRIPPED           = 0x0001;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_EXECUTABLE_IMAGE          = 0x0002;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_LINE_NUMS_STRIPPED        = 0x0004;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_LOCAL_SYMS_STRIPPED       = 0x0008;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_AGGRESIVE_WS_TRIM         = 0x0010;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_LARGE_ADDRESS_AWARE       = 0x0020;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_BYTES_REVERSED_LO         = 0x0080;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_32BIT_MACHINE             = 0x0100;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_DEBUG_STRIPPED            = 0x0200;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_REMOVABLE_RUN_FROM_SWAP   = 0x0400;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_NET_RUN_FROM_SWAP         = 0x0800;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_SYSTEM                    = 0x1000;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_DLL                       = 0x2000;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_UP_SYSTEM_ONLY            = 0x4000;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_FILE_BYTES_REVERSED_HI         = 0x8000;
}
