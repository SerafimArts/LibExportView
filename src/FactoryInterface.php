<?php

declare(strict_types=1);

namespace Serafim\LibExportView;

interface FactoryInterface
{
    public function create(string $title): WindowInterface;
}
