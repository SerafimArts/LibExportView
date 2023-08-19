<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Exception;

final class IconNotReadableException extends IconException
{
    public static function fromPathname(string $pathname): self
    {
        $message = \sprintf('Image file "%s" not readable', $pathname);

        return new self($message);
    }
}
