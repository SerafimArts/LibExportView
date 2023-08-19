<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use FFI\CData;

final class WindowClass
{
    /**
     * @param non-empty-string $id
     * @param CData|\PHPSTORM_META\WNDCLASSW $ptr
     */
    public function __construct(
        private readonly User32 $user32,
        public readonly string $id,
        public readonly CData $ptr,
        public readonly InstanceHandle $instance,
    ) {}

    public function __destruct()
    {
        $text = new Text();

        $this->user32->UnregisterClassW($text->wide($this->id), $this->instance->ptr);
    }
}
