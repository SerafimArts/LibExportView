<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use FFI\CData;

final class WindowHandle
{
    public function __construct(
        private readonly User32 $user32,
        public readonly CData $ptr,
        public readonly WindowClass $class,
    ) {
    }

    public function __destruct()
    {
        $this->user32->DestroyWindow($this->ptr);
    }
}
