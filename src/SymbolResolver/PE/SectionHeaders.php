<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE;

use JetBrains\PhpStorm\Pure;

/**
 * @template-implements \IteratorAggregate<positive-int, SectionHeader>
 */
final class SectionHeaders implements \IteratorAggregate, \Countable
{
    /**
     * @var array<SectionHeader>
     */
    private array $headers;

    /**
     * @param array<SectionHeader> $headers
     */
    public function __construct(array $headers = [])
    {
        $this->headers = $headers;
    }

    /**
     * @param SectionHeader $header
     */
    public function add(SectionHeader $header): void
    {
        $this->headers[] = $header;
    }

    /**
     * @param int $virtualAddress
     * @return SectionHeader|null
     */
    public function findByVirtualAddress(int $virtualAddress): ?SectionHeader
    {
        foreach ($this->headers as $header) {
            if ($header->contains($virtualAddress)) {
                return $header;
            }
        }

        return null;
    }

    /**
     * @param int $virtualAddress
     * @return int|null
     */
    public function virtualAddressToPhysical(int $virtualAddress): ?int
    {
        $addr = $this->findByVirtualAddress($virtualAddress);

        if ($addr === null) {
            return null;
        }

        return $addr->toPhysical($virtualAddress);
    }

    /**
     * @param int $virtualAddress
     * @return int
     */
    public function virtualAddressToPhysicalOrFail(int $virtualAddress): int
    {
        $addr = $this->virtualAddressToPhysical($virtualAddress);

        if ($addr === null) {
            throw new \OutOfRangeException(
                \sprintf('Can not determine the physical address from the virtual (0x%X)', $virtualAddress)
            );
        }

        return $addr;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->headers);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return \count($this->headers);
    }
}
