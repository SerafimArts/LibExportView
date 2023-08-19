<?php

declare(strict_types=1);

namespace Serafim\LibExportView;

use FFI\Env\Runtime;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

final class Application
{
    public const WINDOW_TITLE = 'Library Export View';

    private readonly EventDispatcherInterface $dispatcher;

    private readonly FactoryInterface $factory;

    private ?WindowInterface $window = null;

    public function __construct()
    {
        Runtime::assertAvailable();

        $this->dispatcher = new EventDispatcher();

        $this->factory = match (\PHP_OS_FAMILY) {
            'Windows' => new Win32Factory($this->dispatcher),
            default => throw new \LogicException('Unsupported OS'),
        };
    }

    public function create(): WindowInterface
    {
        return $this->window ??= $this->factory->create(self::WINDOW_TITLE);
    }
}
