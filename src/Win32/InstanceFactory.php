<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

final class InstanceFactory
{
    public function __construct(
        private readonly Kernel32 $kernel32,
    ) {}

    public function create(): InstanceHandle
    {
        return new InstanceHandle(
            ptr: $this->kernel32->GetModuleHandleW(null),
        );
    }
}
