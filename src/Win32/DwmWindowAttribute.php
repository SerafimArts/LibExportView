<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

interface DwmWindowAttribute
{
    /**
     * [get] Is non-client rendering enabled/disabled
     */
    public const DWMWA_NCRENDERING_ENABLED = 1;

    /**
     * [set] DWMNCRENDERINGPOLICY - Non-client rendering policy
     */
    public const DWMWA_NCRENDERING_POLICY = 2;

    /**
     * [set] Potentially enable/forcibly disable transitions
     */
    public const DWMWA_TRANSITIONS_FORCEDISABLED = 3;

    /**
     * [set] Allow contents rendered in the non-client area to be visible on the DWM-drawn frame.
     */
    public const DWMWA_ALLOW_NCPAINT = 4;

    /**
     * [get] Bounds of the caption button area in window-relative space.
     */
    public const DWMWA_CAPTION_BUTTON_BOUNDS = 5;

    /**
     * [set] Is non-client content RTL mirrored
     */
    public const DWMWA_NONCLIENT_RTL_LAYOUT = 6;

    /**
     * [set] Force this window to display iconic thumbnails.
     */
    public const DWMWA_FORCE_ICONIC_REPRESENTATION = 7;

    /**
     * [set] Designates how Flip3D will treat the window.
     */
    public const DWMWA_FLIP3D_POLICY = 8;

    /**
     * [get] Gets the extended frame bounds rectangle in screen space
     */
    public const DWMWA_EXTENDED_FRAME_BOUNDS = 9;

    /**
     * [set] Indicates an available bitmap when there is no better thumbnail representation.
     */
    public const DWMWA_HAS_ICONIC_BITMAP = 10;

    /**
     * [set] Don't invoke Peek on the window.
     */
    public const DWMWA_DISALLOW_PEEK = 11;

    /**
     * [set] LivePreview exclusion information
     */
    public const DWMWA_EXCLUDED_FROM_PEEK = 12;

    /**
     * [set] Cloak or uncloak the window
     */
    public const DWMWA_CLOAK = 13;

    /**
     * [get] Gets the cloaked state of the window
     */
    public const DWMWA_CLOAKED = 14;

    /**
     * [set] BOOL, Force this window to freeze the thumbnail without live update
     */
    public const DWMWA_FREEZE_REPRESENTATION = 15;

    /**
     * [set] BOOL, Updates the window only when desktop composition runs for other reasons
     */
    public const DWMWA_PASSIVE_UPDATE_MODE = 16;

    /**
     * [set] BOOL, Allows the use of host backdrop brushes for the window.
     */
    public const DWMWA_USE_HOSTBACKDROPBRUSH = 17;

    /**
     * [set] BOOL, Allows a window to either use the accent color, or dark, according to the user Color Mode preferences.
     */
    public const DWMWA_USE_IMMERSIVE_DARK_MODE = 20;

    /**
     * [set] WINDOW_CORNER_PREFERENCE, Controls the policy that rounds top-level window corners
     */
    public const DWMWA_WINDOW_CORNER_PREFERENCE = 33;

    /**
     * [set] COLORREF, The color of the thin border around a top-level window
     */
    public const DWMWA_BORDER_COLOR = 34;

    /**
     * [set] COLORREF, The color of the caption
     */
    public const DWMWA_CAPTION_COLOR = 35;

    /**
     * [set] COLORREF, The color of the caption text
     */
    public const DWMWA_TEXT_COLOR = 36;

    /**
     * [get] UINT, width of the visible border around a thick frame window
     */
    public const DWMWA_VISIBLE_FRAME_BORDER_THICKNESS = 37;
}
