<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\ELF\Header\Ident;

/**
 * @psalm-type OsAbiType = OsAbi::ELF_OS_ABI_*
 */
final class OsAbi
{
    /**
     * No extensions or unspecified
     */
    public const ELF_OS_ABI_NONE       = 0x00;
    /**
     * Hewlett-Packard HP-UX
     */
    public const ELF_OS_ABI_HPUX       = 0x01;
    /**
     * NetBSD
     */
    public const ELF_OS_ABI_NETBSD     = 0x02;
    /**
     * Linux
     */
    public const ELF_OS_ABI_LINUX      = 0x03;
    /**
     * Sun Solaris
     */
    public const ELF_OS_ABI_SOLARIS    = 0x06;
    /**
     * AIX
     */
    public const ELF_OS_ABI_AIX        = 0x07;
    /**
     * IRIX
     */
    public const ELF_OS_ABI_IRIX       = 0x08;
    /**
     * FreeBSD
     */
    public const ELF_OS_ABI_FREEBSD    = 0x09;
    /**
     * Compaq TRU64 UNIX
     */
    public const ELF_OS_ABI_TRU64      = 0x0A;
    /**
     * Novell Modesto
     */
    public const ELF_OS_ABI_MODESTO    = 0x0B;
    /**
     * Open BSD
     */
    public const ELF_OS_ABI_OPENBSD    = 0x0C;
    /**
     * Open VMS
     */
    public const ELF_OS_ABI_OPENVMS    = 0x0D;
    /**
     * Hewlett-Packard Non-Stop Kernel
     */
    public const ELF_OS_ABI_NSK        = 0x0E;
    /**
     * Amiga Research OS
     */
    public const ELF_OS_ABI_AROS       = 0x0F;
    /**
     * ARM EABI
     */
    public const ELF_OS_ABI_ARM_AEABI  = 0x40;
    /**
     * ARM
     */
    public const ELF_OS_ABI_ARM        = 0x61;
    /**
     * Standalone (embedded applications)
     */
    public const ELF_OS_ABI_STANDALONE = 0xFF;
}
