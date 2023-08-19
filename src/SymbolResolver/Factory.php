<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver;

use Serafim\LibExportView\SymbolResolver\ELF\Signature as ELFSig;
use Serafim\LibExportView\SymbolResolver\Exception\InvalidArgumentException;
use Serafim\LibExportView\SymbolResolver\PE\Signature as PESig;
use Serafim\LibExportView\SymbolResolver\Stream\Stream;
use Serafim\LibExportView\SymbolResolver\Stream\TypedStream;

final class Factory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function fromPathname(string $pathname): ResolverInterface
    {
        if (! \is_readable($pathname)) {
            throw new InvalidArgumentException(\sprintf('Can not open file [%s] for reading', $pathname));
        }

        return $this->fromResourceStream(\fopen($pathname, 'rb'), true);
    }

    /**
     * {@inheritDoc}
     */
    public function fromResourceStream($stream, bool $close = false): ResolverInterface
    {
        $typed = new TypedStream(new Stream($stream, $close));

        if ($typed->lookahead(fn() => $typed->uint16(true)) === PESig::IMAGE_DOS_SIGNATURE) {
            return new PEResolver($typed);
        }

        if ($typed->lookahead(fn() => $typed->string(4) === ELFSig::ELFMAG)) {
            return new ELFResolver($typed);
        }

        throw new InvalidArgumentException('Cannot to determine the format of the binary file');
    }
}
