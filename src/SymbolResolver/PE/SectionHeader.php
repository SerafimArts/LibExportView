<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE;

use Serafim\LibExportView\SymbolResolver\PE\Section\Characteristics;
use Serafim\LibExportView\SymbolResolver\Stream\TypedStream;
use JetBrains\PhpStorm\Pure;

/**
 * @psalm-import-type CharacteristicsType from Characteristics
 * @see Characteristics
 */
final class SectionHeader
{
    /**
     * @var string
     */
    public string $name = '';

    /**
     * @var positive-int|0
     */
    public int $misc = 0;

    /**
     * @var positive-int|0
     */
    public int $virtualAddress = 0;

    /**
     * @var positive-int|0
     */
    public int $sizeOfRawData = 0;

    /**
     * @var positive-int|0
     */
    public int $pointerToRawData = 0;

    /**
     * @var positive-int|0
     */
    public int $pointerToRelocations = 0;

    /**
     * @var positive-int|0
     */
    public int $pointerToLineNumbers = 0;

    /**
     * @var positive-int|0
     */
    public int $numberOfRelocations = 0;

    /**
     * @var positive-int|0
     */
    public int $numberOfLineNumbers = 0;

    /**
     * The flags that describe the characteristics of the section.
     * For more information, {@see Characteristics}.
     *
     * @var array<CharacteristicsType, bool>
     */
    public array $characteristics = [];

    /**
     * @param TypedStream $stream
     * @return TypedStream
     */
    public function read(TypedStream $stream): TypedStream
    {
        $stream->seek($this->pointerToRawData);

        return $stream->slice($this->sizeOfRawData);
    }

    /**
     * @param int $virtualAddress
     * @return bool
     */
    public function contains(int $virtualAddress): bool
    {
        return $virtualAddress >= $this->virtualAddress &&
            $virtualAddress <= $this->virtualAddress + $this->sizeOfRawData;
    }

    /**
     * @param int $virtualAddress
     * @return int
     */
    public function toPhysical(int $virtualAddress): int
    {
        return $this->pointerToRawData + $virtualAddress - $this->virtualAddress;
    }
}
