<?php

declare(strict_types=1);

namespace Serafim\LibExportView;

interface WindowInterface
{
    public function setTitle(string $title): void;

    public function setIcon(\SplFileInfo $file): void;

    public function show(): void;

    public function hide(): void;

    public function close(): void;

    public function run(): void;
}
