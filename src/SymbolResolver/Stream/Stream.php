<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\Stream;

class Stream implements StreamInterface
{
    /**
     * @var resource
     */
    private $stream;

    /**
     * @var bool
     */
    private bool $close;

    /**
     * @param resource $stream
     * @param bool $close
     */
    public function __construct($stream, bool $close = false)
    {
        $this->stream = $stream;
        $this->close = $close;
    }

    /**
     * @param positive-int|0 $bytes
     * @return string
     */
    public function read(int $bytes): string
    {
        assert($bytes > 0);

        $result = \fread($this->stream, $bytes);

        return $result . \str_repeat("\x00", $bytes - \strlen($result));
    }

    /**
     * {@inheritDoc}
     */
    public function seek(int $offset): int
    {
        return \fseek($this->stream, $offset);
    }

    /**
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificReturnType
     * @psalm-suppress LessSpecificReturnStatement
     */
    public function offset(): int
    {
        return (int)\ftell($this->stream);
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        if ($this->close) {
            \fclose($this->stream);
        }
    }
}
