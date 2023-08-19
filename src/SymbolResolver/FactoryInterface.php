<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver;

use Serafim\LibExportView\SymbolResolver\Exception\InvalidArgumentException;

interface FactoryInterface
{
    /**
     * @param non-empty-string $pathname
     * @return ResolverInterface
     * @throws InvalidArgumentException
     */
    public function fromPathname(string $pathname): ResolverInterface;

    /**
     * @param resource $stream
     * @return ResolverInterface
     * @throws InvalidArgumentException
     */
    public function fromResourceStream($stream): ResolverInterface;
}
