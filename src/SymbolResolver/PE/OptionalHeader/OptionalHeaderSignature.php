<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE\OptionalHeader;

/**
 * @psalm-type SignatureType = OptionalHeaderSignature::*
 */
final class OptionalHeaderSignature
{
    /**
     * @var int
     */
    public const PE32 = 0x10b;

    /**
     * @var int
     */
    public const PE64 = 0x20b;

    /**
     * @var int
     */
    public const ROM  = 0x10;
}
