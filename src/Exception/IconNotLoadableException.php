<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Exception;

final class IconNotLoadableException extends IconException
{
    public static function fromPathname(string $pathname): self
    {
        $message = \sprintf('Image file "%s" not loadable', $pathname);

        return new self($message);
    }
}
