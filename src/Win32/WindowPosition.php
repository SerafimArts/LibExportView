<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

interface WindowPosition
{
    public const SWP_NOSIZE         = 0x0001;
    public const SWP_NOMOVE         = 0x0002;
    public const SWP_NOZORDER       = 0x0004;
    public const SWP_NOREDRAW       = 0x0008;
    public const SWP_NOACTIVATE     = 0x0010;
    public const SWP_FRAMECHANGED   = 0x0020;
    public const SWP_SHOWWINDOW     = 0x0040;
    public const SWP_HIDEWINDOW     = 0x0080;
    public const SWP_NOCOPYBITS     = 0x0100;
    public const SWP_NOOWNERZORDER  = 0x0200;
    public const SWP_NOSENDCHANGING = 0x0400;
    public const SWP_DRAWFRAME      = self::SWP_FRAMECHANGED;
    public const SWP_NOREPOSITION   = self::SWP_NOOWNERZORDER;
    public const SWP_DEFERERASE     = 0x2000;
    public const SWP_ASYNCWINDOWPOS = 0x4000;
}
