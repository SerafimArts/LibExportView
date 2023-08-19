<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

/**
 * @link https://docs.microsoft.com/en-us/windows/win32/winmsg/window-styles
 */
interface WindowStyle
{
    public const WS_OVERLAPPED   = 0x0000_0000;
    public const WS_POPUP        = 0x8000_0000;
    public const WS_CHILD        = 0x4000_0000;
    public const WS_MINIMIZE     = 0x2000_0000;
    public const WS_VISIBLE      = 0x1000_0000;
    public const WS_DISABLED     = 0x0800_0000;
    public const WS_CLIPSIBLINGS = 0x0400_0000;
    public const WS_CLIPCHILDREN = 0x0200_0000;
    public const WS_MAXIMIZE     = 0x0100_0000;
    public const WS_CAPTION      = 0x00C0_0000;
    public const WS_BORDER       = 0x0080_0000;
    public const WS_DLGFRAME     = 0x0040_0000;
    public const WS_VSCROLL      = 0x0020_0000;
    public const WS_HSCROLL      = 0x0010_0000;
    public const WS_SYSMENU      = 0x0008_0000;
    public const WS_THICKFRAME   = 0x0004_0000;
    public const WS_GROUP        = 0x0002_0000;
    public const WS_TABSTOP      = 0x0001_0000;
    public const WS_MINIMIZEBOX  = 0x0002_0000;
    public const WS_MAXIMIZEBOX  = 0x0001_0000;

    // -------------------------------------------------------------------------
    //  Composite Styles
    // -------------------------------------------------------------------------

    public const WS_TILED            = self::WS_OVERLAPPED;
    public const WS_ICONIC           = self::WS_MINIMIZE;
    public const WS_SIZEBOX          = self::WS_THICKFRAME;
    public const WS_TILEDWINDOW      = self::WS_OVERLAPPEDWINDOW;
    public const WS_POPUPWINDOW      = self::WS_POPUP
                                     | self::WS_BORDER
                                     | self::WS_SYSMENU;
    public const WS_CHILDWINDOW      = self::WS_CHILD;
    public const WS_OVERLAPPEDWINDOW = self::WS_OVERLAPPED
                                     | self::WS_CAPTION
                                     | self::WS_SYSMENU
                                     | self::WS_THICKFRAME
                                     | self::WS_MINIMIZEBOX
                                     | self::WS_MAXIMIZEBOX;
}
