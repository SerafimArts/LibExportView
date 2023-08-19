<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use FFI\Env\Runtime;
use FFI\Proxy\Proxy;

final class Control32 extends Proxy
{
    public function __construct()
    {
        Runtime::assertAvailable();

        parent::__construct(\FFI::cdef((string)self::getHeaders(), 'comctl32.dll'));
    }

    public static function getHeaders(): string|\Stringable
    {
        return \file_get_contents(__FILE__, offset: __COMPILER_HALT_OFFSET__);
    }
}

__halt_compiler();

typedef long                BOOL;
typedef unsigned long       DWORD;

typedef struct tagINITCOMMONCONTROLSEX {
    DWORD dwSize;             // size of this structure
    DWORD dwICC;              // flags indicating which classes to be initialized
} INITCOMMONCONTROLSEX, *LPINITCOMMONCONTROLSEX;

BOOL InitCommonControlsEx(
    const INITCOMMONCONTROLSEX *picce
);
