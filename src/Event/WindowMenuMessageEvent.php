<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Event;

final class WindowMenuMessageEvent
{
    public const ID_EXIT = 0;
    public const ID_LOAD_FUNCTIONS = 1;
    public const ID_ABOUT = 2;

    public function __construct(
        public readonly int $id,
    ) {}
}
