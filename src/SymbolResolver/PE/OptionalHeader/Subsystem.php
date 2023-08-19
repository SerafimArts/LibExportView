<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE\OptionalHeader;

/**
 * @psalm-type SubsystemType = Subsystem::*
 */
final class Subsystem
{
    public const IMAGE_SUBSYSTEM_UNKNOWN  = 0;  // Unknown subsystem
    public const NATIVE                   = 1;  // Image doesn't require a subsystem
    public const WINDOWS_GUI              = 2;  // Image runs in the Windows GUI subsystem
    public const WINDOWS_CUI              = 3;  // Image runs in the Windows character subsystem
    public const OS2_CUI                  = 5;  // image runs in the OS/2 character subsystem
    public const POSIX_CUI                = 7;  // image runs in the Posix character subsystem
    public const NATIVE_WINDOWS           = 8;  // image is a native Win9x driver
    public const WINDOWS_CE_GUI           = 9;  // Image runs in the Windows CE subsystem
    public const EFI_APPLICATION          = 10;
    public const EFI_BOOT_SERVICE_DRIVER  = 11;
    public const EFI_RUNTIME_DRIVER       = 12;
    public const EFI_ROM                  = 13;
    public const XBOX                     = 14;
    public const WINDOWS_BOOT_APPLICATION = 16;
}
