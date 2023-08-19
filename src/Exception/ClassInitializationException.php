<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Exception;

final class ClassInitializationException extends LibViewException
{
    public static function fromClassName(string $name): self
    {
        $message = \sprintf('Failed to register window class "%s"', $name);

        return new self($message);
    }
}
