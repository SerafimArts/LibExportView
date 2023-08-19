<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE\Section;

use JetBrains\PhpStorm\Deprecated;

/**
 * @psalm-type CharacteristicsType = Characteristics::IMAGE_SCN_*
 */
final class Characteristics
{
    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_TYPE_REG = 0x0000_0000;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_TYPE_DSECT = 0x0000_0001;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_TYPE_NOLOAD = 0x0000_0002;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_TYPE_GROUP = 0x0000_0004;

    /**
     * The section should not be padded to the next boundary. This flag is
     * obsolete and is replaced by {@see IMAGE_SCN_ALIGN_1BYTES}. This is valid
     * only for object files.
     *
     * @deprecated
     * @var CharacteristicsType
     */
    #[Deprecated(replacement: '%class%::IMAGE_SCN_ALIGN_1BYTES')]
    public const IMAGE_SCN_TYPE_NO_PAD = 0x0000_0008;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_TYPE_COPY = 0x0000_0010;

    /**
     * The section contains executable code.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_CNT_CODE = 0x0000_0020;

    /**
     * The section contains initialized data.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_CNT_INITIALIZED_DATA = 0x0000_0040;

    /**
     * Section contains uninitialized data.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_CNT_UNINITIALIZED_DATA = 0x0000_0080;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_LNK_OTHER = 0x0000_0100;

    /**
     * The section contains comments or other information. The .drectve section
     * has this type. This is valid for object files only.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_LNK_INFO = 0x0000_0200;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_TYPE_OVER = 0x0000_0400;

    /**
     * The section will not become part of the image. This is valid only for
     * object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_LNK_REMOVE = 0x0000_0800;

    /**
     * The section contains COMDAT data. For more information, see COMDAT
     * Sections (Object Only). This is valid only for object files.
     *
     * @link https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#comdat-sections-object-only
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_LNK_COMDAT = 0x0000_1000;

    /**
     * @deprecated Obsolete
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_PROTECTED = 0x0000_4000;

    /**
     * Reset speculative exceptions handling bits in the TLB entries for this
     * section.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_NO_DEFER_SPEC_EXC = 0x0000_4000;

    /**
     * Section content can be accessed relative to GP
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_GPREL = 0x0000_8000;

    /**
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_FARDATA = 0x0000_8000;

    /**
     * @deprecated Obsolete
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_SYSHEAP = 0x0001_0000;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_PURGEABLE = 0x0002_0000;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_16BIT = 0x0002_0000;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_LOCKED = 0x0004_0000;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_PRELOAD = 0x0008_0000;

    /**
     * Align data on a 1-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_1BYTES = 0x0010_0000;

    /**
     * Align data on a 2-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_2BYTES = 0x0020_0000;

    /**
     * Align data on a 4-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_4BYTES = 0x0030_0000;

    /**
     * Align data on a 8-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_8BYTES = 0x0040_0000;

    /**
     * Default alignment if no others are specified. Align data on a 16-byte
     * boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_16BYTES = 0x0050_0000;

    /**
     * Align data on a 32-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_32BYTES = 0x0060_0000;

    /**
     * Align data on a 64-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_64BYTES = 0x0070_0000;

    /**
     * Align data on a 128-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_128BYTES = 0x0080_0000;

    /**
     * Align data on a 256-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_256BYTES = 0x0090_0000;

    /**
     * Align data on a 512-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_512BYTES = 0x00A0_0000;

    /**
     * Align data on a 1024-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_1024BYTES = 0x00B0_0000;

    /**
     * Align data on a 2048-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_2048BYTES = 0x00C0_0000;

    /**
     * Align data on a 4096-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_4096BYTES = 0x00D0_0000;

    /**
     * Align data on a 8192-byte boundary. Valid only for object files.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_8192BYTES = 0x00E0_0000;

    /**
     * Reserved for future use.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_ALIGN_MASK = 0x00F0_0000;

    /**
     * Section contains extended relocations.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_LNK_NRELOC_OVFL = 0x0100_0000;

    /**
     * Section can be discarded.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_DISCARDABLE = 0x0200_0000;

    /**
     * Section is not cachable.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_NOT_CACHED = 0x0400_0000;

    /**
     * Section is not pageable.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_NOT_PAGED = 0x0800_0000;

    /**
     * Section is shareable.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_SHARED = 0x1000_0000;

    /**
     * Section is executable.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_EXECUTE = 0x2000_0000;

    /**
     * Section is readable.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_READ = 0x4000_0000;

    /**
     * Section is writeable.
     *
     * @var CharacteristicsType
     */
    public const IMAGE_SCN_MEM_WRITE = 0x8000_0000;
}
