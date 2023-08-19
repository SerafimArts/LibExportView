<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\ELF\Header;

use Serafim\LibExportView\SymbolResolver\ELF\Header\Ident\ElfClass;
use Serafim\LibExportView\SymbolResolver\ELF\Header\Ident\ElfData;
use Serafim\LibExportView\SymbolResolver\ELF\Header\Ident\OsAbi;
use Serafim\LibExportView\SymbolResolver\ELF\Header\Ident\Version;
use Serafim\LibExportView\SymbolResolver\ELF\Signature;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * @psalm-import-type ClassType from ElfClass
 * @psalm-import-type DataType from ElfData
 * @psalm-import-type VersionType from Version
 * @psalm-import-type OsAbiType from OsAbi
 */
final class Ident
{
    /**
     * @var string
     */
    public string $idenitifcation = Signature::ELFMAG;

    /**
     * @var ClassType
     */
    #[ExpectedValues(valuesFromClass: ElfClass::class)]
    public int $class = ElfClass::ELF_CLASS_NONE;

    /**
     * @var DataType
     */
    #[ExpectedValues(valuesFromClass: ElfData::class)]
    public int $data = ElfData::ELF_DATA_NONE;

    /**
     * @var VersionType
     */
    #[ExpectedValues(valuesFromClass: Version::class)]
    public int $version = Version::EV_NONE;

    /**
     * @var OsAbiType
     */
    #[ExpectedValues(valuesFromClass: OsAbi::class)]
    public int $abi = OsAbi::ELF_OS_ABI_NONE;

    /**
     * @var positive-int|0
     */
    public int $abiVersion = 0;

    /**
     * @var array<positive-int|0>
     */
    public array $pad = [0, 0, 0, 0, 0, 0];

    /**
     * @var positive-int|0
     */
    public int $nIdentSize = 0;
}
