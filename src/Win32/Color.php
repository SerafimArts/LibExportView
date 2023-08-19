<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

/**
 * @link https://learn.microsoft.com/en-us/windows/win32/api/winuser/nf-winuser-getsyscolor#parameters
 */
interface Color
{
    public const COLOR_SCROLLBAR                 = 0;
    public const COLOR_BACKGROUND                = 1;
    public const COLOR_ACTIVECAPTION             = 2;
    public const COLOR_INACTIVECAPTION           = 3;
    public const COLOR_MENU                      = 4;
    public const COLOR_WINDOW                    = 5;
    public const COLOR_WINDOWFRAME               = 6;
    public const COLOR_MENUTEXT                  = 7;
    public const COLOR_WINDOWTEXT                = 8;
    public const COLOR_CAPTIONTEXT               = 9;
    public const COLOR_ACTIVEBORDER              = 10;
    public const COLOR_INACTIVEBORDER            = 11;
    public const COLOR_APPWORKSPACE              = 12;
    public const COLOR_HIGHLIGHT                 = 13;
    public const COLOR_HIGHLIGHTTEXT             = 14;
    public const COLOR_BTNFACE                   = 15;
    public const COLOR_BTNSHADOW                 = 16;
    public const COLOR_GRAYTEXT                  = 17;
    public const COLOR_BTNTEXT                   = 18;
    public const COLOR_INACTIVECAPTIONTEXT       = 19;
    public const COLOR_BTNHIGHLIGHT              = 20;
    public const COLOR_3DDKSHADOW                = 21;
    public const COLOR_3DLIGHT                   = 22;
    public const COLOR_INFOTEXT                  = 23;
    public const COLOR_INFOBK                    = 24;
    public const COLOR_HOTLIGHT                  = 26;
    public const COLOR_GRADIENTACTIVECAPTION     = 27;
    public const COLOR_GRADIENTINACTIVECAPTION   = 28;
    public const COLOR_MENUHILIGHT               = 29;
    public const COLOR_MENUBAR                   = 30;
    public const COLOR_DESKTOP                   = self::COLOR_BACKGROUND;
    public const COLOR_3DFACE                    = self::COLOR_BTNFACE;
    public const COLOR_3DSHADOW                  = self::COLOR_BTNSHADOW;
    public const COLOR_3DHIGHLIGHT               = self::COLOR_BTNHIGHLIGHT;
    public const COLOR_3DHILIGHT                 = self::COLOR_BTNHIGHLIGHT;
    public const COLOR_BTNHILIGHT                = self::COLOR_BTNHIGHLIGHT;
}
