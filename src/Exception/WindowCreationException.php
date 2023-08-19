<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Exception;

final class WindowCreationException extends LibViewException
{
    public static function fromClassName(string $name): self
    {
        $message = \sprintf('Failed to create window "%s"', $name);

        return new self($message);
    }
}
