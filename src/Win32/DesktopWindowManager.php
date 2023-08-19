<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use FFI\Env\Runtime;
use FFI\Proxy\Proxy;

final class DesktopWindowManager extends Proxy
{
    public function __construct()
    {
        Runtime::assertAvailable();

        parent::__construct(\FFI::cdef((string)self::getHeaders(), 'dwmapi.dll'));
    }

    public static function getHeaders(): string|\Stringable
    {
        return \file_get_contents(__FILE__, offset: __COMPILER_HALT_OFFSET__);
    }
}

__halt_compiler();

typedef void                *HWND;
typedef void                *LPVOID;
typedef void                *HRGN;

typedef int64_t             INT_PTR;
typedef uint64_t            UINT_PTR;
typedef int64_t             LONG_PTR;
typedef uint64_t            ULONG_PTR;

typedef long                BOOL;
typedef char                CHAR;
typedef signed char         INT8;
typedef unsigned char       UCHAR;
typedef unsigned char       UINT8;
typedef unsigned char       BYTE;
typedef short               SHORT;
typedef signed short        INT16;
typedef unsigned short      USHORT;
typedef unsigned short      UINT16;
typedef unsigned short      WORD;
typedef int                 INT;
typedef signed int          INT32;
typedef unsigned int        UINT;
typedef unsigned int        UINT32;
typedef long                LONG;
typedef unsigned long       ULONG;
typedef unsigned long       DWORD;
typedef int64_t             LONGLONG;
typedef int64_t             LONG64;
typedef int64_t             INT64;
typedef uint64_t            ULONGLONG;
typedef uint64_t            DWORDLONG;
typedef uint64_t            ULONG64;
typedef uint64_t            DWORD64;
typedef uint64_t            UINT64;

typedef LONG                HRESULT;

typedef enum {
    /*
    * Let the system decide whether or not to round window corners
    */
    DWMWCP_DEFAULT                                 = 0,

    /*
    * Never round window corners
    */
    DWMWCP_DONOTROUND                              = 1,

    /*
    * Round the corners if appropriate
    */
    DWMWCP_ROUND                                   = 2,

    /*
    * Round the corners if appropriate, with a small radius
    */
    DWMWCP_ROUNDSMALL                              = 3
} DWM_WINDOW_CORNER_PREFERENCE;

typedef enum DWMWINDOWATTRIBUTE
{
    DWMWA_NCRENDERING_ENABLED = 1,              // [get] Is non-client rendering enabled/disabled
    DWMWA_NCRENDERING_POLICY,                   // [set] DWMNCRENDERINGPOLICY - Non-client rendering policy
    DWMWA_TRANSITIONS_FORCEDISABLED,            // [set] Potentially enable/forcibly disable transitions
    DWMWA_ALLOW_NCPAINT,                        // [set] Allow contents rendered in the non-client area to be visible on the DWM-drawn frame.
    DWMWA_CAPTION_BUTTON_BOUNDS,                // [get] Bounds of the caption button area in window-relative space.
    DWMWA_NONCLIENT_RTL_LAYOUT,                 // [set] Is non-client content RTL mirrored
    DWMWA_FORCE_ICONIC_REPRESENTATION,          // [set] Force this window to display iconic thumbnails.
    DWMWA_FLIP3D_POLICY,                        // [set] Designates how Flip3D will treat the window.
    DWMWA_EXTENDED_FRAME_BOUNDS,                // [get] Gets the extended frame bounds rectangle in screen space
    DWMWA_HAS_ICONIC_BITMAP,                    // [set] Indicates an available bitmap when there is no better thumbnail representation.
    DWMWA_DISALLOW_PEEK,                        // [set] Don't invoke Peek on the window.
    DWMWA_EXCLUDED_FROM_PEEK,                   // [set] LivePreview exclusion information
    DWMWA_CLOAK,                                // [set] Cloak or uncloak the window
    DWMWA_CLOAKED,                              // [get] Gets the cloaked state of the window
    DWMWA_FREEZE_REPRESENTATION,                // [set] BOOL, Force this window to freeze the thumbnail without live update
    DWMWA_PASSIVE_UPDATE_MODE,                  // [set] BOOL, Updates the window only when desktop composition runs for other reasons
    DWMWA_USE_HOSTBACKDROPBRUSH,                // [set] BOOL, Allows the use of host backdrop brushes for the window.
    DWMWA_USE_IMMERSIVE_DARK_MODE = 20,         // [set] BOOL, Allows a window to either use the accent color, or dark, according to the user Color Mode preferences.
    DWMWA_WINDOW_CORNER_PREFERENCE = 33,        // [set] WINDOW_CORNER_PREFERENCE, Controls the policy that rounds top-level window corners
    DWMWA_BORDER_COLOR,                         // [set] COLORREF, The color of the thin border around a top-level window
    DWMWA_CAPTION_COLOR,                        // [set] COLORREF, The color of the caption
    DWMWA_TEXT_COLOR,                           // [set] COLORREF, The color of the caption text
    DWMWA_VISIBLE_FRAME_BORDER_THICKNESS,       // [get] UINT, width of the visible border around a thick frame window
    DWMWA_LAST
} DWMWINDOWATTRIBUTE;

typedef struct _DWM_BLURBEHIND
{
    DWORD dwFlags;
    BOOL fEnable;
    HRGN hRgnBlur;
    BOOL fTransitionOnMaximized;
} DWM_BLURBEHIND, *PDWM_BLURBEHIND;

HRESULT DwmSetWindowAttribute(HWND hwnd, DWMWINDOWATTRIBUTE dwAttribute, const DWM_WINDOW_CORNER_PREFERENCE* pvAttribute, DWORD cbAttribute);

HRESULT DwmEnableBlurBehindWindow(HWND hWnd, const DWM_BLURBEHIND* pBlurBehind);
