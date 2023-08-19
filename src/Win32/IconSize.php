<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

/**
 * @link https://docs.microsoft.com/en-us/windows/win32/winmsg/wm-seticon
 */
interface IconSize
{
    public const ICON_SMALL  = 0x00;
    public const ICON_BIG    = 0x01;
    public const ICON_SMALL2 = 0x02;
}
