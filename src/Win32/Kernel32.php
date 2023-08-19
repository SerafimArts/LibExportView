<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use FFI\Env\Runtime;
use FFI\Proxy\Proxy;

final class Kernel32 extends Proxy
{
    public function __construct()
    {
        Runtime::assertAvailable();

        parent::__construct(\FFI::cdef((string)self::getHeaders(), 'kernel32.dll'));
    }

    public static function getHeaders(): string|\Stringable
    {
        return \file_get_contents(__FILE__, offset: __COMPILER_HALT_OFFSET__);
    }
}

__halt_compiler();

typedef char            CHAR;
typedef char            WCHAR;
typedef const CHAR      *LPCSTR;
typedef const WCHAR     *LPCWSTR;
typedef void            *HINSTANCE;
typedef HINSTANCE       HMODULE;

HMODULE GetModuleHandleA(LPCSTR lpModuleName);
HMODULE GetModuleHandleW(LPCWSTR lpModuleName);
