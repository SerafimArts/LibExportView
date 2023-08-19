<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\Stream;

interface StreamInterface
{
    /**
     * @param positive-int|0 $bytes
     * @return string
     */
    public function read(int $bytes): string;

    /**
     * @param int $offset
     * @return int
     */
    public function seek(int $offset): int;

    /**
     * @return positive-int|0
     */
    public function offset(): int;
}
