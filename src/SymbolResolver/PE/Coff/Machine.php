<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE\Coff;

/**
 * @psalm-type MachineType = Machine::MACHINE_*
 */
final class Machine
{
    public const MACHINE_UNKNOWN   = 0x00_00;
    public const MACHINE_I386      = 0x01_4C;
    public const MACHINE_R3000     = 0x01_62;  // MIPS little-endian, 0x160 big-endian
    public const MACHINE_R4000     = 0x01_66;  // MIPS little-endian
    public const MACHINE_R10000    = 0x01_68;  // MIPS little-endian
    public const MACHINE_WCEMIPSV2 = 0x01_69;  // MIPS little-endian WCE v2
    public const MACHINE_ALPHA     = 0x01_84;  // Alpha_AXP
    public const MACHINE_SH3       = 0x01_A2;  // SH3 little-endian
    public const MACHINE_SH3DSP    = 0x01_A3;
    public const MACHINE_SH3E      = 0x01_A4;  // SH3E little-endian
    public const MACHINE_SH4       = 0x01_A6;  // SH4 little-endian
    public const MACHINE_SH5       = 0x01_A8;  // SH5
    public const MACHINE_ARM       = 0x01_C0;  // ARM Little-Endian
    public const MACHINE_THUMB     = 0x01_C2;
    public const MACHINE_AM33      = 0x01_D3;
    public const MACHINE_POWERPC   = 0x01_F0;  // IBM PowerPC Little-Endian
    public const MACHINE_POWERPCFP = 0x01_F1;
    public const MACHINE_IA64      = 0x02_00;  // Intel 64
    public const MACHINE_MIPS16    = 0x02_66;  // MIPS
    public const MACHINE_ALPHA64   = 0x02_84;  // ALPHA64
    public const MACHINE_MIPSFPU   = 0x03_66;  // MIPS
    public const MACHINE_MIPSFPU16 = 0x04_66;  // MIPS
    public const MACHINE_TRICORE   = 0x05_20;  // Infineon
    public const MACHINE_CEF       = 0x0C_EF;
    public const MACHINE_EBC       = 0x0E_BC;  // EFI Byte Code
    public const MACHINE_AMD64     = 0x86_64;  // AMD64 (K8)
    public const MACHINE_M32R      = 0x90_41;  // M32R little-endian
    public const MACHINE_CEE       = 0xC0_EE;
}
