<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE;

/**
 * @psalm-type SignatureType = Signature::IMAGE_*
 */
final class Signature
{
    /**
     * @var positive-int
     */
    public const IMAGE_DOS_SIGNATURE = 0x5A_4D;

    /**
     * @var positive-int
     */
    public const IMAGE_OS2_SIGNATURE = 0x45_4E;

    /**
     * @var positive-int
     */
    public const IMAGE_OS2_SIGNATURE_LE = 0x45_4C;

    /**
     * @var positive-int
     */
    public const IMAGE_NT_SIGNATURE = 0x00_00_45_50;
}
