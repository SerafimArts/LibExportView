<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver;

final class ExportFunction
{
    public function __construct(
        public readonly string $name,
        public readonly int $addr,
    ) {}
}
