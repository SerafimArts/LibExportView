<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use FFI\CData;
use FFI\Env\Runtime;

final class Text
{
    /**
     * @var non-empty-string
     */
    private const DEFAULT_INTERNAL_ENCODING = 'UTF-8';

    /**
     * @var non-empty-string
     */
    public readonly string $internalEncoding;

    /**
     * @var non-empty-string
     */
    public readonly string $externalEncoding;

    private readonly \FFI $ffi;

    /**
     * @param non-empty-string|null $internalEncoding
     * @param non-empty-string|null $externalEncoding
     */
    public function __construct(
        ?string $internalEncoding = null,
        ?string $externalEncoding = null,
    ) {
        Runtime::assertAvailable();

        $this->ffi = \FFI::cdef();

        $this->internalEncoding = self::bootInternalEncoding($internalEncoding);
        $this->externalEncoding = self::bootExternalEncoding($externalEncoding);
    }

    /**
     * @param non-empty-string|null $encoding
     * @return non-empty-string
     */
    private static function bootInternalEncoding(?string $encoding): string
    {
        return $encoding ?? \mb_internal_encoding() ?: self::DEFAULT_INTERNAL_ENCODING;
    }

    /**
     * @param non-empty-string|null $encoding
     * @return non-empty-string
     */
    private static function bootExternalEncoding(?string $encoding): string
    {
        if ($encoding !== null) {
            return $encoding;
        }

        $suffix = \unpack('S', "\x01\x00")[1] === 1 ? 'LE' : 'BE';

        return 'UTF-16' . $suffix;
    }

    public function decode(string $text, string $encoding = null): string
    {
        return \rtrim(\mb_convert_encoding($text, $this->internalEncoding, $encoding ?? $this->externalEncoding), "\0");
    }

    /**
     * @param non-empty-string|null $encoding
     */
    public function wide(string $text, string $encoding = null, bool $owned = true): CData
    {
        $encoded = \mb_convert_encoding($text, $encoding ?? $this->externalEncoding, $this->internalEncoding);

        $length = \strlen($nullTerminated = $encoded . "\0\0\0\0");
        $instance = $this->ffi->new("const char[$length]", $owned);

        \FFI::memcpy($instance, $nullTerminated, $length);

        return $instance;
    }

    public function ansi(string $text, bool $owned = true): CData
    {
        $length = \strlen($text .= "\0");
        $instance = $this->ffi->new("const char[$length]", $owned);

        \FFI::memcpy($instance, $text, $length);

        return $instance;
    }
}
