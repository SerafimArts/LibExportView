<?php

// @formatter:off
// phpcs:ignoreFile

/**
 * A helper file for FFI, to provide autocomplete information to your IDE
 * Generated for FFI {@see Serafim\LibExportView\Win32\Dialog}.
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
        // ffi_serafim_libexportview_win32_dialogtypes_list
        'ffi_serafim_libexportview_win32_dialogtypes_list',
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
        'HANDLE',
        'HWND',
        'HINSTANCE',
        'CHAR',
        'LPSTR',
        'LPCSTR',
        'WCHAR',
        'TCHAR',
        'LPWSTR',
        'LPTSTR',
        'LPCWSTR',
        'LPCTSTR',
        'BOOL',
        'UINT',
        'WORD',
        'DWORD',
        'UINT_PTR',
        'LONG_PTR',
        'ULONG_PTR',
        'WPARAM',
        'LPARAM',
        'LPOFNHOOKPROC',
        'OPENFILENAMEA',
        'OPENFILENAMEA*',
        'OPENFILENAMEA**',
        'LPOPENFILENAMEA',
        'LPOPENFILENAMEA*',
        'LPOPENFILENAMEA**',
        'OPENFILENAMEW',
        'OPENFILENAMEW*',
        'OPENFILENAMEW**',
        'LPOPENFILENAMEW',
        'LPOPENFILENAMEW*',
        'LPOPENFILENAMEW**',
    );
    expectedArguments(\Serafim\LibExportView\Win32\Dialog::new(), 0, argumentsSet('ffi_serafim_libexportview_win32_dialogtypes_list'));
    expectedArguments(\Serafim\LibExportView\Win32\Dialog::cast(), 0, argumentsSet('ffi_serafim_libexportview_win32_dialogtypes_list'));
    expectedArguments(\Serafim\LibExportView\Win32\Dialog::type(), 0, argumentsSet('ffi_serafim_libexportview_win32_dialogtypes_list'));
    override(\Serafim\LibExportView\Win32\Dialog::new(0), map([
        // List of return type coercions
        '' => '\PHPSTORM_META\@',
        'OPENFILENAMEA' => '\PHPSTORM_META\Openfilenamea',
        'OPENFILENAMEA*' => '\PHPSTORM_META\Openfilenamea[]',
        'OPENFILENAMEA**' => '\PHPSTORM_META\Openfilenamea[]',
        'OPENFILENAMEA**' => '\PHPSTORM_META\Openfilenamea[][]',
        'LPOPENFILENAMEA' => '\PHPSTORM_META\Lpopenfilenamea',
        'LPOPENFILENAMEA*' => '\PHPSTORM_META\Lpopenfilenamea[]',
        'LPOPENFILENAMEA**' => '\PHPSTORM_META\Lpopenfilenamea[]',
        'LPOPENFILENAMEA**' => '\PHPSTORM_META\Lpopenfilenamea[][]',
        'OPENFILENAMEW' => '\PHPSTORM_META\Openfilenamew',
        'OPENFILENAMEW*' => '\PHPSTORM_META\Openfilenamew[]',
        'OPENFILENAMEW**' => '\PHPSTORM_META\Openfilenamew[]',
        'OPENFILENAMEW**' => '\PHPSTORM_META\Openfilenamew[][]',
        'LPOPENFILENAMEW' => '\PHPSTORM_META\Lpopenfilenamew',
        'LPOPENFILENAMEW*' => '\PHPSTORM_META\Lpopenfilenamew[]',
        'LPOPENFILENAMEW**' => '\PHPSTORM_META\Lpopenfilenamew[]',
        'LPOPENFILENAMEW**' => '\PHPSTORM_META\Lpopenfilenamew[][]',
    ]));
    /**
     * Generated "OPENFILENAMEA" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class Openfilenamea extends \FFI\CData
    {
        /**
         * @var int<0, 4294967296>
         */
        public int $lStructSize;
        public ?\FFI\CData $hwndOwner;
        public ?\FFI\CData $hInstance;
        public string|\FFI\CData $lpstrFilter;
        public string|\FFI\CData $lpstrCustomFilter;
        /**
         * @var int<0, 4294967296>
         */
        public int $nMaxCustFilter;
        /**
         * @var int<0, 4294967296>
         */
        public int $nFilterIndex;
        public string|\FFI\CData $lpstrFile;
        /**
         * @var int<0, 4294967296>
         */
        public int $nMaxFile;
        public string|\FFI\CData $lpstrFileTitle;
        /**
         * @var int<0, 4294967296>
         */
        public int $nMaxFileTitle;
        public string|\FFI\CData $lpstrInitialDir;
        public string|\FFI\CData $lpstrTitle;
        /**
         * @var int<0, 4294967296>
         */
        public int $Flags;
        /**
         * @var int<0, 65536>
         */
        public int $nFileOffset;
        /**
         * @var int<0, 65536>
         */
        public int $nFileExtension;
        public string|\FFI\CData $lpstrDefExt;
        /**
         * @var int<min, max>
         */
        public int $lCustData;
        /**
         * @var FFI\CData|null|callable(mixed, int<0, 4294967296>, int<0, max>, int<min, max>):(int<0, max>)
         */
        public ?\Closure $lpfnHook;
        public string|\FFI\CData $lpTemplateName;
        public ?\FFI\CData $pvReserved;
        /**
         * @var int<0, 4294967296>
         */
        public int $dwReserved;
        /**
         * @var int<0, 4294967296>
         */
        public int $FlagsEx;
        /**
         * @internal Please use {@see \Serafim\LibExportView\Win32\Dialog::new()} with 'OPENFILENAMEA' argument instead.
         */
        private function __construct()
        {
        }
    }
    /**
     * Generated "OPENFILENAMEW" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class Openfilenamew extends \FFI\CData
    {
        /**
         * @var int<0, 4294967296>
         */
        public int $lStructSize;
        public ?\FFI\CData $hwndOwner;
        public ?\FFI\CData $hInstance;
        public string|\FFI\CData $lpstrFilter;
        public string|\FFI\CData $lpstrCustomFilter;
        /**
         * @var int<0, 4294967296>
         */
        public int $nMaxCustFilter;
        /**
         * @var int<0, 4294967296>
         */
        public int $nFilterIndex;
        public string|\FFI\CData $lpstrFile;
        /**
         * @var int<0, 4294967296>
         */
        public int $nMaxFile;
        public string|\FFI\CData $lpstrFileTitle;
        /**
         * @var int<0, 4294967296>
         */
        public int $nMaxFileTitle;
        public string|\FFI\CData $lpstrInitialDir;
        public string|\FFI\CData $lpstrTitle;
        /**
         * @var int<0, 4294967296>
         */
        public int $Flags;
        /**
         * @var int<0, 65536>
         */
        public int $nFileOffset;
        /**
         * @var int<0, 65536>
         */
        public int $nFileExtension;
        public string|\FFI\CData $lpstrDefExt;
        /**
         * @var int<min, max>
         */
        public int $lCustData;
        /**
         * @var FFI\CData|null|callable(mixed, int<0, 4294967296>, int<0, max>, int<min, max>):(int<0, max>)
         */
        public ?\Closure $lpfnHook;
        public string|\FFI\CData $lpTemplateName;
        public ?\FFI\CData $pvReserved;
        /**
         * @var int<0, 4294967296>
         */
        public int $dwReserved;
        /**
         * @var int<0, 4294967296>
         */
        public int $FlagsEx;
        /**
         * @internal Please use {@see \Serafim\LibExportView\Win32\Dialog::new()} with 'OPENFILENAMEW' argument instead.
         */
        private function __construct()
        {
        }
    }
}
namespace Serafim\LibExportView\Win32 {
    interface Dialog
    {
        /**
         * @return int<-2147483648, 2147483647>
         */
        public function GetOpenFileNameA(?\FFI\CData $_0): int;
        /**
         * @return int<-2147483648, 2147483647>
         */
        public function GetOpenFileNameW(?\FFI\CData $_0): int;
    }
}