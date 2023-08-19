<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver;

use Serafim\LibExportView\SymbolResolver\ELF\Header;
use Serafim\LibExportView\SymbolResolver\ELF\Header\Ident;
use Serafim\LibExportView\SymbolResolver\Stream\TypedStream;

final class ELFResolver extends Resolver
{
    public Header $header;

    /**
     * @param TypedStream $stream
     */
    public function __construct(TypedStream $stream)
    {
        $stream = $stream->withLittleEndian();

        // Read ELF header
        $this->header = $this->readHeader($stream);

        // Read Program Header
        for ($i = 0; $i < $this->header->phnum; ++$i) {
            $stream->seek($this->header->phoff + $i * $this->header->phentsize);
        }

        // Read Section Header Tables
        for ($i = 0; $i < $this->header->shnum; ++$i) {
            $stream->seek($this->header->shoff + $i * $this->header->shentsize);
        }

        throw new \LogicException('Not implemented yet');
    }

    /**
     * @param TypedStream $stream
     * @return Header
     */
    private function readHeader(TypedStream $stream): Header
    {
        $header = new Header();

        $header->ident = $this->readIdent($stream);
        $header->type = $stream->uint16();
        $header->machine = $stream->uint16();
        $header->version = $stream->uint32();
        if ($header->ident->class !== Ident\ElfClass::ELF_CLASS_32) {
            $header->entry = $stream->uint64();
            $header->phoff = $stream->uint64();
            $header->shoff = $stream->uint64();
        } else {
            $header->entry = $stream->uint32();
            $header->phoff = $stream->uint32();
            $header->shoff = $stream->uint32();
        }
        $header->flags = $stream->uint32();
        $header->ehsize = $stream->uint16();
        $header->phentsize = $stream->uint16();
        $header->phnum = $stream->uint16();
        $header->shentsize = $stream->uint16();
        $header->shnum = $stream->uint16();
        $header->shstrndx = $stream->uint16();

        return $header;
    }

    /**
     * @param TypedStream $stream
     * @return Ident
     * @psalm-suppress PropertyTypeCoercion
     * @psalm-suppress MixedPropertyTypeCoercion
     */
    private function readIdent(TypedStream $stream): Ident
    {
        $ident = new Ident();

        $ident->idenitifcation = $stream->read(4);
        $ident->class = $stream->uint8();
        $ident->data = $stream->uint8();
        $ident->version = $stream->uint8();
        $ident->abi = $stream->uint8();
        $ident->abiVersion = $stream->uint8();
        $ident->pad = $stream->array(6, Type::TYPE_UINT8);
        $ident->nIdentSize = $stream->uint8();

        return $ident;
    }

    public function getIterator(): \Traversable
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }

    public function count(): int
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }

    public function exists(string $function): bool
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }
}

