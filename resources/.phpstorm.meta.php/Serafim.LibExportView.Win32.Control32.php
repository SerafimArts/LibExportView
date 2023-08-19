<?php

// @formatter:off
// phpcs:ignoreFile

/**
 * A helper file for FFI, to provide autocomplete information to your IDE
 * Generated for FFI {@see Serafim\LibExportView\Win32\Control32}.
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
        // ffi_serafim_libexportview_win32_control32types_list
        'ffi_serafim_libexportview_win32_control32types_list',
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
        'BOOL',
        'DWORD',
        'INITCOMMONCONTROLSEX',
        'INITCOMMONCONTROLSEX*',
        'INITCOMMONCONTROLSEX**',
        'LPINITCOMMONCONTROLSEX',
        'LPINITCOMMONCONTROLSEX*',
        'LPINITCOMMONCONTROLSEX**',
    );
    expectedArguments(\Serafim\LibExportView\Win32\Control32::new(), 0, argumentsSet('ffi_serafim_libexportview_win32_control32types_list'));
    expectedArguments(\Serafim\LibExportView\Win32\Control32::cast(), 0, argumentsSet('ffi_serafim_libexportview_win32_control32types_list'));
    expectedArguments(\Serafim\LibExportView\Win32\Control32::type(), 0, argumentsSet('ffi_serafim_libexportview_win32_control32types_list'));
    override(\Serafim\LibExportView\Win32\Control32::new(0), map([
        // List of return type coercions
        '' => '\PHPSTORM_META\@',
        'INITCOMMONCONTROLSEX' => '\PHPSTORM_META\Initcommoncontrolsex',
        'INITCOMMONCONTROLSEX*' => '\PHPSTORM_META\Initcommoncontrolsex[]',
        'INITCOMMONCONTROLSEX**' => '\PHPSTORM_META\Initcommoncontrolsex[]',
        'INITCOMMONCONTROLSEX**' => '\PHPSTORM_META\Initcommoncontrolsex[][]',
        'LPINITCOMMONCONTROLSEX' => '\PHPSTORM_META\Lpinitcommoncontrolsex',
        'LPINITCOMMONCONTROLSEX*' => '\PHPSTORM_META\Lpinitcommoncontrolsex[]',
        'LPINITCOMMONCONTROLSEX**' => '\PHPSTORM_META\Lpinitcommoncontrolsex[]',
        'LPINITCOMMONCONTROLSEX**' => '\PHPSTORM_META\Lpinitcommoncontrolsex[][]',
    ]));
    /**
     * Generated "INITCOMMONCONTROLSEX" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class Initcommoncontrolsex extends \FFI\CData
    {
        /**
         * @var int<0, 4294967296>
         */
        public int $dwSize;
        /**
         * @var int<0, 4294967296>
         */
        public int $dwICC;
        /**
         * @internal Please use {@see \Serafim\LibExportView\Win32\Control32::new()} with 'INITCOMMONCONTROLSEX' argument instead.
         */
        private function __construct()
        {
        }
    }
}
namespace Serafim\LibExportView\Win32 {
    interface Control32
    {
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\Initcommoncontrolsex} $picce
         * @return int<-2147483648, 2147483647>
         */
        public function InitCommonControlsEx(?\FFI\CData $picce): int;
    }
}