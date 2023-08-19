<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\ELF;

use Serafim\LibExportView\SymbolResolver\ELF\Header\FileType;
use Serafim\LibExportView\SymbolResolver\ELF\Header\Ident;
use Serafim\LibExportView\SymbolResolver\ELF\Header\Machine;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * @psalm-import-type FileTypeEnum from FileType
 * @psalm-import-type MachineType from Machine
 */
final class Header
{
    /**
     * Magic number and other info.
     *
     * @var Ident
     */
    public Ident $ident;

    /**
     * Object file type
     *
     * @var FileTypeEnum
     */
    #[ExpectedValues(valuesFromClass: FileType::class)]
    public int $type = FileType::ET_NONE;

    /**
     * Architecture
     *
     * @var MachineType
     */
    #[ExpectedValues(valuesFromClass: Machine::class)]
    public int $machine = Machine::EM_NONE;

    /**
     * Object file version
     *
     * @var positive-int|0
     */
    public int $version = 0;

    /**
     * Entry point virtual address
     *
     * @var positive-int|0
     */
    public int $entry = 0;

    /**
     * Program header table file offset
     *
     * @var positive-int|0
     */
    public int $phoff = 0;

    /**
     * Section header table file offset
     *
     * @var positive-int|0
     */
    public int $shoff = 0;

    /**
     * Processor-specific flags
     *
     * @var positive-int|0
     */
    public int $flags = 0;

    /**
     * ELF Header size in bytes
     *
     * @var positive-int|0
     */
    public int $ehsize = 0;

    /**
     * Program header table entry size
     *
     * @var positive-int|0
     */
    public int $phentsize = 0;

    /**
     * Program header table entry count
     *
     * @var positive-int|0
     */
    public int $phnum = 0;

    /**
     * Section header table entry size
     *
     * @var positive-int|0
     */
    public int $shentsize = 0;

    /**
     * Section header table entry count
     *
     * @var positive-int|0
     */
    public int $shnum = 0;

    /**
     * Section header string table index
     *
     * @var positive-int|0
     */
    public int $shstrndx = 0;

    /**
     * Header construct.
     */
    public function __construct()
    {
        $this->ident = new Ident();
    }
}
