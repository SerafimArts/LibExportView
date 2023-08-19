<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver;

/**
 * @template-extends \IteratorAggregate<array-key, ExportFunction>
 */
interface ResolverInterface extends \IteratorAggregate, \Countable
{
    /**
     * @param non-empty-string $function
     * @return bool
     */
    public function exists(string $function): bool;
}
