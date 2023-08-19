<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use FFI\CData;

final class InstanceHandle
{
    public function __construct(
        public readonly CData $ptr,
    ) {}
}
