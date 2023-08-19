<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\ELF\Header\Ident;

/**
 * @psalm-type DataType = ElfData::*
 */
final class ElfData
{
    public const ELF_DATA_NONE = 0;
    public const ELF_DATA2LSB = 1;
    public const ELF_DATA2MSB = 2;
}
