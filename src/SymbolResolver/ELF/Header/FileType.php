<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\ELF\Header;

/**
 * These constants define the different elf file types
 *
 * @psalm-type FileTypeEnum = FileType::ET_*
 */
final class FileType
{
    public const ET_NONE   = 0x0000;
    public const ET_REL    = 0x0001;
    public const ET_EXEC   = 0x0002;
    public const ET_DYN    = 0x0003;
    public const ET_CORE   = 0x0004;
    public const ET_LOOS   = 0xFE00;
    public const ET_HIOS   = 0xFEFF;
    public const ET_LOPROC = 0xFF00;
    public const ET_HIPROC = 0xFFFF;
}
