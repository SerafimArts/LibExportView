<?php

// @formatter:off
// phpcs:ignoreFile

/**
 * A helper file for FFI, to provide autocomplete information to your IDE
 * Generated for FFI {@see Serafim\LibExportView\Win32\DesktopWindowManager}.
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author Nesmeyanov Kirill <nesk@xakep.ru>
 * @see https://github.com/php-ffi/ide-helper-generator
 *
 * @psalm-suppress all
 */

declare (strict_types=1);
namespace PHPSTORM_META {
    registerArgumentsSet(
        // ffi_serafim_libexportview_win32_desktopwindowmanagertypes_list
        'ffi_serafim_libexportview_win32_desktopwindowmanagertypes_list',
        'void*',
        'bool',
        'float',
        'double',
        'char',
        'int8_t',
        'uint8_t',
        'int16_t',
        'uint16_t',
        'int32_t',
        'uint32_t',
        'int64_t',
        'uint64_t',
        'HWND',
        'LPVOID',
        'HRGN',
        'INT_PTR',
        'UINT_PTR',
        'LONG_PTR',
        'ULONG_PTR',
        'BOOL',
        'CHAR',
        'INT8',
        'UCHAR',
        'UINT8',
        'BYTE',
        'SHORT',
        'INT16',
        'USHORT',
        'UINT16',
        'WORD',
        'INT',
        'INT32',
        'UINT',
        'UINT32',
        'LONG',
        'ULONG',
        'DWORD',
        'LONGLONG',
        'LONG64',
        'INT64',
        'ULONGLONG',
        'DWORDLONG',
        'ULONG64',
        'DWORD64',
        'UINT64',
        'HRESULT',
        'DWM_WINDOW_CORNER_PREFERENCE',
        'DWMWINDOWATTRIBUTE',
        'DWM_BLURBEHIND',
        'DWM_BLURBEHIND*',
        'DWM_BLURBEHIND**',
        'PDWM_BLURBEHIND',
        'PDWM_BLURBEHIND*',
        'PDWM_BLURBEHIND**',
    );
    expectedArguments(\Serafim\LibExportView\Win32\DesktopWindowManager::new(), 0, argumentsSet('ffi_serafim_libexportview_win32_desktopwindowmanagertypes_list'));
    expectedArguments(\Serafim\LibExportView\Win32\DesktopWindowManager::cast(), 0, argumentsSet('ffi_serafim_libexportview_win32_desktopwindowmanagertypes_list'));
    expectedArguments(\Serafim\LibExportView\Win32\DesktopWindowManager::type(), 0, argumentsSet('ffi_serafim_libexportview_win32_desktopwindowmanagertypes_list'));
    override(\Serafim\LibExportView\Win32\DesktopWindowManager::new(0), map([
        // List of return type coercions
        '' => '\PHPSTORM_META\@',
        'DWM_BLURBEHIND' => '\PHPSTORM_META\DwmBlurbehind',
        'DWM_BLURBEHIND*' => '\PHPSTORM_META\DwmBlurbehind[]',
        'DWM_BLURBEHIND**' => '\PHPSTORM_META\DwmBlurbehind[]',
        'DWM_BLURBEHIND**' => '\PHPSTORM_META\DwmBlurbehind[][]',
        'PDWM_BLURBEHIND' => '\PHPSTORM_META\PdwmBlurbehind',
        'PDWM_BLURBEHIND*' => '\PHPSTORM_META\PdwmBlurbehind[]',
        'PDWM_BLURBEHIND**' => '\PHPSTORM_META\PdwmBlurbehind[]',
        'PDWM_BLURBEHIND**' => '\PHPSTORM_META\PdwmBlurbehind[][]',
    ]));
    /**
     * Generated "DWM_BLURBEHIND" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class DwmBlurbehind extends \FFI\CData
    {
        /**
         * @var int<0, 4294967296>
         */
        public int $dwFlags;
        /**
         * @var int<-2147483648, 2147483647>
         */
        public int $fEnable;
        public ?\FFI\CData $hRgnBlur;
        /**
         * @var int<-2147483648, 2147483647>
         */
        public int $fTransitionOnMaximized;
        /**
         * @internal Please use {@see \Serafim\LibExportView\Win32\DesktopWindowManager::new()} with 'DWM_BLURBEHIND' argument instead.
         */
        private function __construct()
        {
        }
    }
    registerArgumentsSet(
        // ffi_serafim_libexportview_win32_desktopwindowmanagerdwm_window_corner_preference
        'ffi_serafim_libexportview_win32_desktopwindowmanagerdwm_window_corner_preference',
        \Serafim\LibExportView\Win32\DwmWindowCornerPreference::DWMWCP_DEFAULT,
        \Serafim\LibExportView\Win32\DwmWindowCornerPreference::DWMWCP_DONOTROUND,
        \Serafim\LibExportView\Win32\DwmWindowCornerPreference::DWMWCP_ROUND,
        \Serafim\LibExportView\Win32\DwmWindowCornerPreference::DWMWCP_ROUNDSMALL
    );
    registerArgumentsSet(
        // ffi_serafim_libexportview_win32_desktopwindowmanagerdwmwindowattribute
        'ffi_serafim_libexportview_win32_desktopwindowmanagerdwmwindowattribute',
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_NCRENDERING_ENABLED,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_NCRENDERING_POLICY,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_TRANSITIONS_FORCEDISABLED,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_ALLOW_NCPAINT,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_CAPTION_BUTTON_BOUNDS,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_NONCLIENT_RTL_LAYOUT,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_FORCE_ICONIC_REPRESENTATION,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_FLIP3D_POLICY,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_EXTENDED_FRAME_BOUNDS,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_HAS_ICONIC_BITMAP,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_DISALLOW_PEEK,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_EXCLUDED_FROM_PEEK,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_CLOAK,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_CLOAKED,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_FREEZE_REPRESENTATION,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_PASSIVE_UPDATE_MODE,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_USE_HOSTBACKDROPBRUSH,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_USE_IMMERSIVE_DARK_MODE,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_WINDOW_CORNER_PREFERENCE,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_BORDER_COLOR,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_CAPTION_COLOR,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_TEXT_COLOR,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_VISIBLE_FRAME_BORDER_THICKNESS,
        \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_LAST
    );
    expectedArguments(\Serafim\LibExportView\Win32\DesktopWindowManager::DwmSetWindowAttribute(), 1, argumentsSet('ffi_serafim_libexportview_win32_desktopwindowmanagerdwmwindowattribute'));
}
namespace Serafim\LibExportView\Win32 {
    interface DesktopWindowManager
    {
        /**
         * @param int<-2147483648, 2147483647>|\Serafim\LibExportView\Win32\DwmWindowAttribute::* $dwAttribute
         * @param null|\FFI\CData|array{int<-2147483648, 2147483647>|\Serafim\LibExportView\Win32\DwmWindowCornerPreference::*} $pvAttribute
         * @param int<0, 4294967296> $cbAttribute
         * @return int<-2147483648, 2147483647>
         */
        public function DwmSetWindowAttribute(?\FFI\CData $hwnd, #[\JetBrains\PhpStorm\ExpectedValues(flags: [\Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_NCRENDERING_ENABLED, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_NCRENDERING_POLICY, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_TRANSITIONS_FORCEDISABLED, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_ALLOW_NCPAINT, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_CAPTION_BUTTON_BOUNDS, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_NONCLIENT_RTL_LAYOUT, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_FORCE_ICONIC_REPRESENTATION, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_FLIP3D_POLICY, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_EXTENDED_FRAME_BOUNDS, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_HAS_ICONIC_BITMAP, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_DISALLOW_PEEK, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_EXCLUDED_FROM_PEEK, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_CLOAK, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_CLOAKED, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_FREEZE_REPRESENTATION, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_PASSIVE_UPDATE_MODE, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_USE_HOSTBACKDROPBRUSH, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_USE_IMMERSIVE_DARK_MODE, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_WINDOW_CORNER_PREFERENCE, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_BORDER_COLOR, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_CAPTION_COLOR, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_TEXT_COLOR, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_VISIBLE_FRAME_BORDER_THICKNESS, \Serafim\LibExportView\Win32\DwmWindowAttribute::DWMWA_LAST])] int $dwAttribute, ?\FFI\CData $pvAttribute, int $cbAttribute): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\DwmBlurbehind} $pBlurBehind
         * @return int<-2147483648, 2147483647>
         */
        public function DwmEnableBlurBehindWindow(?\FFI\CData $hWnd, ?\FFI\CData $pBlurBehind): int;
    }
}