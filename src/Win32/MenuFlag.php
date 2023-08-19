<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

interface MenuFlag
{
    public const MF_INSERT           = 0x0000_0000;
    public const MF_CHANGE           = 0x0000_0080;
    public const MF_APPEND           = 0x0000_0100;
    public const MF_DELETE           = 0x0000_0200;
    public const MF_REMOVE           = 0x0000_1000;
    public const MF_BYCOMMAND        = 0x0000_0000;
    public const MF_BYPOSITION       = 0x0000_0400;
    public const MF_SEPARATOR        = 0x0000_0800;
    public const MF_ENABLED          = 0x0000_0000;
    public const MF_GRAYED           = 0x0000_0001;
    public const MF_DISABLED         = 0x0000_0002;
    public const MF_UNCHECKED        = 0x0000_0000;
    public const MF_CHECKED          = 0x0000_0008;
    public const MF_USECHECKBITMAPS  = 0x0000_0200;
    public const MF_STRING           = 0x0000_0000;
    public const MF_BITMAP           = 0x0000_0004;
    public const MF_OWNERDRAW        = 0x0000_0100;
    public const MF_POPUP            = 0x0000_0010;
    public const MF_MENUBARBREAK     = 0x0000_0020;
    public const MF_MENUBREAK        = 0x0000_0040;
    public const MF_UNHILITE         = 0x0000_0000;
    public const MF_HILITE           = 0x0000_0080;
    public const MF_DEFAULT          = 0x0000_1000;
    public const MF_SYSMENU          = 0x0000_2000;
    public const MF_HELP             = 0x0000_4000;
    public const MF_RIGHTJUSTIFY     = 0x0000_4000;
    public const MF_MOUSESELECT      = 0x0000_8000;
    public const MF_END              = 0x0000_0080;
}
