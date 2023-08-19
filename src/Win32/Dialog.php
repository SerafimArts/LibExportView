<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use FFI\Env\Runtime;
use FFI\Proxy\Proxy;

final class Dialog extends Proxy
{
    public function __construct()
    {
        Runtime::assertAvailable();

        parent::__construct(\FFI::cdef((string)self::getHeaders(), 'comdlg32.dll'));
    }

    public static function getHeaders(): string|\Stringable
    {
        return \file_get_contents(__FILE__, offset: __COMPILER_HALT_OFFSET__);
    }
}

__halt_compiler();

typedef void*               HANDLE;
typedef HANDLE              HWND;
typedef HANDLE              HINSTANCE;

typedef char                CHAR;
typedef CHAR                *LPSTR;
typedef const CHAR          *LPCSTR;

typedef char                WCHAR;
typedef WCHAR               TCHAR;

typedef WCHAR               *LPWSTR;
typedef TCHAR               *LPTSTR;
typedef const WCHAR         *LPCWSTR;
typedef const TCHAR         *LPCTSTR;

typedef long                BOOL;
typedef unsigned int        UINT;
typedef unsigned short      WORD;
typedef unsigned long       DWORD;
typedef uint64_t            UINT_PTR;
typedef int64_t             LONG_PTR;
typedef uint64_t            ULONG_PTR;
typedef UINT_PTR            WPARAM;
typedef LONG_PTR            LPARAM;

typedef UINT_PTR (*LPOFNHOOKPROC) (HWND, UINT, WPARAM, LPARAM);

typedef struct tagOFNA {
    DWORD        lStructSize;
    HWND         hwndOwner;
    HINSTANCE    hInstance;
    LPCSTR       lpstrFilter;
    LPSTR        lpstrCustomFilter;
    DWORD        nMaxCustFilter;
    DWORD        nFilterIndex;
    LPSTR        lpstrFile;
    DWORD        nMaxFile;
    LPSTR        lpstrFileTitle;
    DWORD        nMaxFileTitle;
    LPCSTR       lpstrInitialDir;
    LPCSTR       lpstrTitle;
    DWORD        Flags;
    WORD         nFileOffset;
    WORD         nFileExtension;
    LPCSTR       lpstrDefExt;
    LPARAM       lCustData;
    LPOFNHOOKPROC lpfnHook;
    LPCSTR       lpTemplateName;
    void *        pvReserved;
    DWORD        dwReserved;
    DWORD        FlagsEx;
} OPENFILENAMEA, *LPOPENFILENAMEA;

typedef struct tagOFNW {
    DWORD        lStructSize;
    HWND         hwndOwner;
    HINSTANCE    hInstance;
    LPCWSTR      lpstrFilter;
    LPWSTR       lpstrCustomFilter;
    DWORD        nMaxCustFilter;
    DWORD        nFilterIndex;
    LPWSTR       lpstrFile;
    DWORD        nMaxFile;
    LPWSTR       lpstrFileTitle;
    DWORD        nMaxFileTitle;
    LPCWSTR      lpstrInitialDir;
    LPCWSTR      lpstrTitle;
    DWORD        Flags;
    WORD         nFileOffset;
    WORD         nFileExtension;
    LPCWSTR      lpstrDefExt;
    LPARAM       lCustData;
    LPOFNHOOKPROC lpfnHook;
    LPCWSTR      lpTemplateName;
    void *        pvReserved;
    DWORD        dwReserved;
    DWORD        FlagsEx;
} OPENFILENAMEW, *LPOPENFILENAMEW;

BOOL GetOpenFileNameA(LPOPENFILENAMEA);
BOOL GetOpenFileNameW(LPOPENFILENAMEW);
