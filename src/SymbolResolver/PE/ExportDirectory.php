<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE;

use Serafim\LibExportView\SymbolResolver\ExportFunction;

final class ExportDirectory
{
    /**
     * @var positive-int|0
     */
    public int $characteristics = 0;

    /**
     * @var \DateTimeInterface
     */
    public \DateTimeInterface $timeDateStamp;

    /**
     * @var positive-int|0
     */
    public int $majorVersion = 0;

    /**
     * @var positive-int|0
     */
    public int $minorVersion = 0;

    /**
     * @var positive-int|0
     */
    public int $name = 0;

    /**
     * @var positive-int|0
     */
    public int $base = 0;

    /**
     * @var positive-int|0
     */
    public int $numberOfFunctions = 0;

    /**
     * @var positive-int|0
     */
    public int $numberOfNames = 0;

    /**
     * @var positive-int|0
     */
    public int $addressOfFunctions = 0;

    /**
     * @var positive-int|0
     */
    public int $addressOfNames = 0;

    /**
     * @var positive-int|0
     */
    public int $addressOfNameOrdinals = 0;

    /**
     * @var array<ExportFunction>
     */
    public array $functions = [];

    /**
     * ExportDirectory constructor.
     */
    public function __construct()
    {
        $this->timeDateStamp = new \DateTimeImmutable();
    }
}
