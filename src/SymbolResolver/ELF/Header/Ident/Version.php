<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\ELF\Header\Ident;

/**
 * @psalm-type VersionType = Version::EV_*
 */
final class Version
{
    public const EV_NONE    = 0;
    public const EV_CURRENT = 1;
    public const EV_NUM     = 2;
}
