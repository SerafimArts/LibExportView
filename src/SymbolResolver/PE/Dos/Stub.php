<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE\Dos;

final class Stub
{
    /**
     * @var string
     */
    #[Type(bytes: 64)]
    public string $data = '';
}
