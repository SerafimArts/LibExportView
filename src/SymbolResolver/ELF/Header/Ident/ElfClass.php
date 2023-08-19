<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\ELF\Header\Ident;

/**
 * @psalm-type ClassType = ElfClass::*
 */
final class ElfClass
{
    public const ELF_CLASS_NONE = 0;
    public const ELF_CLASS_32   = 1;
    public const ELF_CLASS_64   = 2;
    public const ELF_CLASS_NUM  = 3;
}
