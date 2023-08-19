<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

interface Monitor
{
    public const MONITOR_DEFAULTTONULL    = 0x0000_0000;
    public const MONITOR_DEFAULTTOPRIMARY = 0x0000_0001;
    public const MONITOR_DEFAULTTONEAREST = 0x0000_0002;
}
