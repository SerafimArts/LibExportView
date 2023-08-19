<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\ELF\Header;

/**
 * These constants define the various ELF target machines.
 *
 * @psalm-type MachineType = Machine::EM_*
 */
final class Machine
{
    /**
     * None
     */
    public const EM_NONE = 0;

    /**
     * AT&T WE 32100
     */
    public const EM_M32 = 1;

    /**
     * SPARC
     */
    public const EM_SPARC = 2;

    /**
     * Intel 80386
     */
    public const EM_386 = 3;

    /**
     * Motorola 68000
     */
    public const EM_68K = 4;

    /**
     * Motorola 88000
     */
    public const EM_88K = 5;

    /**
     * Perhaps disused. Reserved for future use
     */
    public const EM_486 = 6;

    /**
     * Intel 80860
     */
    public const EM_860 = 7;

    /**
     * MIPS R3000 (officially, big-endian only).
     */
    public const EM_MIPS = 8;

    /**
     * IBM System/370 Processor
     */
    public const EM_S370 = 9;

    /**
     * MIPS R3000 little-endian
     */
    public const EM_MIPS_RS3_LE = 10;

    /**
     * MIPS R4000 big-endian
     */
    public const EM_MIPS_RS4_BE = 10;

    /**
     * HPPA
     */
    public const EM_PARISC = 15;

    /**
     * Fujitsu VPP500
     */
    public const EM_VPP500 = 17;

    /**
     * Enhanced instruction set SPARC.
     * Sun's "v8plus"
     */
    public const EM_SPARC32PLUS = 18;

    /**
     * Intel 80960
     */
    public const EM_960 = 18;

    /**
     * PowerPC
     */
    public const EM_PPC = 20;

    /**
     * PowerPC64
     */
    public const EM_PPC64 = 21;

    /**
     * IBM S/390
     */
    public const EM_S390 = 22;

    /**
     * Cell BE SPU
     */
    public const EM_SPU = 23;

    /**
     * NEC V800
     */
    public const EM_V800 = 36;

    /**
     * Fujitsu FR20
     */
    public const EM_FR20 = 37;

    /**
     * TRW RH-32
     */
    public const EM_RH32 = 38;

    /**
     * Motorola RCE
     */
    public const EM_RCE = 39;

    /**
     * ARM 32 bit
     */
    public const EM_ARM = 40;

    /**
     * Digital Alpha
     */
    public const EM_DALPHA = 41;

    /**
     * Hitachi SuperH
     */
    public const EM_SH = 42;

    /**
     * SPARC v9 64-bit
     */
    public const EM_SPARCV9 = 43;

    /**
     * Siemens TriCore embedded processor
     */
    public const EM_TRICORE = 44;

    /**
     * Argonaut RISC Core, Argonaut Technologies Inc.
     */
    public const EM_ARC = 45;

    /**
     * Hitachi H8/300
     */
    public const EM_H8_300 = 46;

    /**
     * Hitachi H8/300H
     */
    public const EM_H8_300H = 47;

    /**
     * Hitachi H8S
     */
    public const EM_H8S = 48;

    /**
     * Hitachi H8/500
     */
    public const EM_H8_500 = 49;

    /**
     * HP/Intel IA-64
     */
    public const EM_IA_64 = 50;

    /**
     * Stanford MIPS-X
     */
    public const EM_MIPS_X = 51;

    /**
     * Motorola ColdFire
     */
    public const EM_COLDFIRE = 52;

    /**
     * Motorola M68HC12
     */
    public const EM_68HC12 = 53;

    /**
     * Fujitsu MMA Multimedia Accelerator
     */
    public const EM_MMA = 54;

    /**
     * Siemens PCP
     */
    public const EM_PCP = 55;

    /**
     * Sony nCPU embedded RISC processor
     */
    public const EM_NCPU = 56;

    /**
     * Denso NDR1 microprocessor
     */
    public const EM_NDR1 = 57;

    /**
     * Motorola Star*Core processor
     */
    public const EM_STARCORE = 58;

    /**
     * Toyota ME16 processor
     */
    public const EM_ME16 = 59;

    /**
     * STMicroelectronics ST100 processor
     */
    public const EM_ST100 = 60;

    /**
     * Advanced Logic Corp. TinyJ embedded processor family
     */
    public const EM_TINYJ = 61;

    /**
     * AMD x86-64
     */
    public const EM_X86_64 = 62;

    /**
     * Sony DSP Processor
     */
    public const EM_PDSP = 63;

    /**
     * Digital Equipment Corp. PDP-10
     */
    public const EM_PDP10 = 64;

    /**
     * Digital Equipment Corp. PDP-11
     */
    public const EM_PDP11 = 65;

    /**
     * Siemens FX66 microcontroller
     */
    public const EM_FX66 = 66;

    /**
     * STMicroelectronics ST9+ 8/16 bit microcontroller
     */
    public const EM_ST9PLUS = 67;

    /**
     * STMicroelectronics ST7 8-bit microcontroller
     */
    public const EM_ST7 = 68;

    /**
     * Motorola MC68HC16 Microcontroller
     */
    public const EM_68HC16 = 69;

    /**
     * Motorola MC68HC11 Microcontroller
     */
    public const EM_68HC11 = 70;

    /**
     * Motorola MC68HC08 Microcontroller
     */
    public const EM_68HC08 = 71;

    /**
     * Motorola MC68HC05 Microcontroller
     */
    public const EM_68HC05 = 72;

    /**
     * Silicon Graphics SVx
     */
    public const EM_SVX = 73;

    /**
     * Digital VAX
     */
    public const EM_ST19 = 75;

    /**
     * Axis Communications 32-bit embedded processor
     */
    public const EM_CRIS = 76;

    /**
     * Infineon Technologies 32-bit embedded processor
     */
    public const EM_JAVELIN = 77;

    /**
     * Element 14 64-bit DSP Processor
     */
    public const EM_FIREPATH = 78;

    /**
     * LSI Logic 16-bit DSP Processor
     */
    public const EM_ZSP = 79;

    /**
     * Donald Knuth's educational 64-bit processor
     */
    public const EM_MMIX = 80;

    /**
     * Harvard University machine-independent object files
     */
    public const EM_HUANY = 81;

    /**
     * SiTera Prism
     */
    public const EM_PRISM = 82;

    /**
     * Atmel AVR 8-bit microcontroller
     */
    public const EM_AVR = 83;

    /**
     * Fujitsu FR30
     */
    public const EM_FR30 = 84;

    /**
     * Mitsubishi D10V
     */
    public const EM_D10V = 85;

    /**
     * Mitsubishi D30V
     */
    public const EM_D30V = 86;

    /**
     * NEC v850
     */
    public const EM_V850 = 87;

    /**
     * Renesas M32R
     */
    public const EM_M32R = 88;

    /**
     * Panasonic/MEI MN10300, AM33
     */
    public const EM_MN10300 = 89;

    /**
     * Matsushita MN10200
     */
    public const EM_MN10200 = 90;

    /**
     * picoJava
     */
    public const EM_PJ = 91;

    /**
     * OpenRISC 32-bit embedded processor
     */
    public const EM_OPENRISC = 92;

    /**
     * ARCompact processor
     */
    public const EM_ARCOMPACT = 93;

    /**
     * Tensilica Xtensa Architecture
     */
    public const EM_XTENSA = 94;


    /**
     * Alphamosaic VideoCore processor
     */
    public const EM_VIDEOCORE = 95;

    /**
     * Thompson Multimedia General Purpose Processor
     */
    public const EM_TMM_GPP = 96;

    /**
     * National Semiconductor 32000 series
     */
    public const EM_NS32K = 97;

    /**
     * Tenor Network TPC processor
     */
    public const EM_TPC = 98;

    /**
     * Trebia SNP 1000 processor
     */
    public const EM_SNP1K = 99;

    /**
     * STMicroelectronics (www.st.com) ST200 microcontroller
     */
    public const EM_ST200 = 100;

    /**
     * Ubicom IP2xxx microcontroller family
     */
    public const EM_IP2K = 101;

    /**
     * MAX Processor
     */
    public const EM_MAX = 102;

    /**
     * National Semiconductor CompactRISC microprocessor
     */
    public const EM_CR = 103;

    /**
     * Fujitsu F2MC16
     */
    public const EM_F2MC16 = 104;

    /**
     * Texas Instruments embedded microcontroller msp430
     */
    public const EM_MSP430 = 105;

    /**
     * ADI Blackfin Processor
     */
    public const EM_BLACKFIN = 106;

    /**
     * S1C33 Family of Seiko Epson processors
     */
    public const EM_SE_C33 = 107;

    /**
     * Sharp embedded microprocessor
     */
    public const EM_SEP = 108;

    /**
     * Arca RISC Microprocessor
     */
    public const EM_ARCA = 109;

    /**
     * UniCore-32
     * Microprocessor series from PKU-Unity Ltd. and MPRC of Peking University
     */
    public const EM_UNICORE = 110;

    /**
     * Altera Nios II soft-core processor
     */
    public const EM_ALTERA_NIOS2 = 113;

    /**
     * TI C6X DSPs
     */
    public const EM_TI_C6000 = 140;

    /**
     * QUALCOMM Hexagon
     */
    public const EM_HEXAGON = 164;

    /**
     * Andes Technology compact code size embedded RISC processor family
     */
    public const EM_NDS32 = 167;

    /**
     * ARM 64 bit
     */
    public const EM_AARCH64 = 183;

    /**
     * Tilera TILEPro
     */
    public const EM_TILEPRO = 188;

    /**
     * Xilinx MicroBlaze
     */
    public const EM_MICROBLAZE = 189;

    /**
     * Tilera TILE-Gx
     */
    public const EM_TILEGX = 191;

    /**
     * ARCv2 Cores
     */
    public const EM_ARCV2 = 195;

    /**
     * RISC-V
     */
    public const EM_RISCV = 243;

    /**
     * Linux BPF - in-kernel virtual machine
     */
    public const EM_BPF = 247;

    /**
     * C-SKY
     */
    public const EM_CSKY = 252;

    /**
     * Fujitsu FR-V
     */
    public const EM_FRV = 0x5441;

    /**
     * This is an interim value that we will use until the committee comes
     * up with a final number.
     */
    public const EM_ALPHA = 0x9026;

    /**
     * Bogus old m32r magic number, used by old tools.
     */
    public const EM_CYGNUS_M32R = 0x9041;

    /**
     * This is the old interim value for S/390 architecture
     */
    public const EM_S390_OLD = 0xA390;

    /**
     * Also Panasonic/MEI MN10300, AM33
     */
    public const EM_CYGNUS_MN10300 = 0xbeef;
}
