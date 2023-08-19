<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\Stream;

use Serafim\LibExportView\SymbolResolver\Type;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * @psalm-import-type TypeEnum from Type
 */
final class TypedStream implements StreamInterface
{
    /**
     * @var bool
     */
    private bool $le;

    /**
     * @var StreamInterface
     */
    private StreamInterface $stream;

    /**
     * @param StreamInterface $stream
     * @param bool|null $le
     */
    public function __construct(StreamInterface $stream, bool $le = null)
    {
        $this->stream = $stream;
        $this->le = $le ?? (\unpack('S', "\x01\x00")[1] === 1);
    }

    /**
     * @return $this
     */
    public function withLittleEndian(): self
    {
        $self = clone $this;
        $self->le = true;
        return $self;
    }

    /**
     * @return $this
     */
    public function withBigEndian(): self
    {
        $self = clone $this;
        $self->le = false;
        return $self;
    }

    /**
     * {@inheritDoc}
     */
    public function read(int $bytes): string
    {
        return $this->stream->read($bytes);
    }

    /**
     * {@inheritDoc}
     */
    public function seek(int $offset): int
    {
        return $this->stream->seek($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function offset(): int
    {
        return $this->stream->offset();
    }

    /**
     * @param TypeEnum $type
     * @return mixed
     */
    private function readAs(string $type)
    {
        $result = \unpack($type, $this->read(Type::size($type)));

        return \reset($result);
    }

    /**
     * @return int
     */
    public function int8(): int
    {
        return (int)$this->readAs(Type::TYPE_INT8);
    }

    /**
     * @return positive-int|0
     */
    public function uint8(): int
    {
        return (int)$this->readAs(Type::TYPE_UINT8);
    }

    /**
     * @return int
     */
    public function int16(): int
    {
        return (int)$this->readAs(Type::TYPE_INT16);
    }

    /**
     * @param bool|null $le
     * @return positive-int|0
     */
    public function uint16(bool $le = null): int
    {
        $le ??= $this->le;

        return (int)$this->readAs( $le ? Type::TYPE_UINT16_LE : Type::TYPE_UINT16_BE);
    }

    /**
     * @return int
     */
    public function int32(): int
    {
        return (int)$this->readAs(Type::TYPE_INT32);
    }

    /**
     * @param bool|null $le
     * @return positive-int|0
     */
    public function uint32(bool $le = null): int
    {
        $le ??= $this->le;

        return (int)$this->readAs($le ? Type::TYPE_UINT32_LE : Type::TYPE_UINT32_BE);
    }

    /**
     * @return int
     */
    public function int64(): int
    {
        return (int)$this->readAs(Type::TYPE_INT64);
    }

    /**
     * @param bool|null $le
     * @return positive-int|0
     */
    public function uint64(bool $le = null): int
    {
        $le ??= $this->le;

        return (int)$this->readAs($le ? Type::TYPE_UINT64_LE : Type::TYPE_UINT64_BE);
    }

    /**
     * @param bool|null $le
     * @return float
     */
    public function float32(bool $le = null): float
    {
        $le ??= $this->le;

        return (float)$this->readAs($le ? Type::TYPE_FLOAT32_LE : Type::TYPE_FLOAT32_BE);
    }

    /**
     * @param bool|null $le
     * @return float
     */
    public function float64(bool $le = null): float
    {
        $le ??= $this->le;

        return (float)$this->readAs($le ? Type::TYPE_FLOAT64_LE : Type::TYPE_FLOAT64_BE);
    }

    /**
     * @param bool|null $le
     * @return \DateTimeInterface
     */
    public function timestamp(bool $le = null): \DateTimeInterface
    {
        $timestamp = $this->uint32($le);

        return (new \DateTimeImmutable())->setTimestamp($timestamp);
    }

    /**
     * @param positive-int|0 $size
     * @param TypeEnum $type
     * @return array
     */
    public function array(
        int $size,
        #[ExpectedValues(valuesFromClass: Type::class)]
        string $type
    ): array {
        $result = [];

        for ($i = 0; $i < $size; ++$i) {
            $result[] = $this->readAs($type);
        }

        return $result;
    }

    /**
     * @return string
     */
    public function char(): string
    {
        return $this->read(1);
    }

    /**
     * @param positive-int|null|0 $size
     * @return string
     */
    public function string(?int $size = null): string
    {
        if ($size === null) {
            $buffer = '';

            while (($char = $this->read(1)) !== "\x00") {
                $buffer .= $char;
            }

            return $buffer;
        }

        return \rtrim($this->read($size), "\x00");
    }

    /**
     * @template T of mixed
     *
     * @param callable(TypedStream): T $handler
     * @return T
     */
    public function lookahead(callable $handler)
    {
        $offset = $this->offset();
        $result = $handler($this);
        $this->seek($offset);

        return $result;
    }

    /**
     * @param positive-int|0 $bytes
     * @return TypedStream
     */
    public function slice(int $bytes): TypedStream
    {
        $stream = \fopen('php://memory', 'ab+');
        \fwrite($stream, $this->read($bytes));
        \rewind($stream);

        return new self(new Stream($stream, true), $this->le);
    }

    /**
     * @param positive-int|0 $bytes
     * @return array<bool>
     */
    public function bitmask(int $bytes): array
    {
        $result = [];

        for ($i = 0; $i < $bytes; ++$i) {
            $byte = \ord($this->read(1));
            $bits = \str_pad(\decbin($byte), 8, '0', \STR_PAD_LEFT);
            foreach (\str_split($bits) as $bit) {
                $result[] = (bool)(int)$bit;
            }
        }

        return $result;
    }
}
