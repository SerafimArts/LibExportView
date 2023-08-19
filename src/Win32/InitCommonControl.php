<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

interface InitCommonControl
{
    public const ICC_LISTVIEW_CLASSES   = 0x00000001; // listview, header
    public const ICC_TREEVIEW_CLASSES   = 0x00000002; // treeview, tooltips
    public const ICC_BAR_CLASSES        = 0x00000004; // toolbar, statusbar, trackbar, tooltips
    public const ICC_TAB_CLASSES        = 0x00000008; // tab, tooltips
    public const ICC_UPDOWN_CLASS       = 0x00000010; // updown
    public const ICC_PROGRESS_CLASS     = 0x00000020; // progress
    public const ICC_HOTKEY_CLASS       = 0x00000040; // hotkey
    public const ICC_ANIMATE_CLASS      = 0x00000080; // animate
    public const ICC_WIN95_CLASSES      = 0x000000FF;
    public const ICC_DATE_CLASSES       = 0x00000100; // month picker, date picker, time picker, updown
    public const ICC_USEREX_CLASSES     = 0x00000200; // comboex
    public const ICC_COOL_CLASSES       = 0x00000400; // rebar (coolbar) control
    public const ICC_INTERNET_CLASSES   = 0x00000800;
    public const ICC_PAGESCROLLER_CLASS = 0x00001000; // page scroller
    public const ICC_NATIVEFNTCTL_CLASS = 0x00002000; // native font control
    public const ICC_STANDARD_CLASSES   = 0x00004000;
    public const ICC_LINK_CLASS         = 0x00008000;
}
