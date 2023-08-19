<?php

declare(strict_types=1);

namespace Serafim\LibExportView;

use Serafim\LibExportView\Win32\Control32;
use Serafim\LibExportView\Win32\DesktopWindowManager;
use Serafim\LibExportView\Win32\Dialog;
use Serafim\LibExportView\Win32\WindowClassFactory;
use Serafim\LibExportView\Win32\InstanceFactory;
use Serafim\LibExportView\Win32\Kernel32;
use Serafim\LibExportView\Win32\Text;
use Serafim\LibExportView\Win32\User32;
use Serafim\LibExportView\Win32\WindowFactory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class Win32Factory implements FactoryInterface
{
    private readonly Kernel32 $kernel32;
    private readonly User32 $user32;
    private readonly Control32 $controls;
    private readonly DesktopWindowManager $dwm;
    private readonly Dialog $dialog;

    private readonly Text $text;

    private readonly InstanceFactory $instanceFactory;
    private readonly WindowClassFactory $classFactory;
    private readonly WindowFactory $windowFactory;

    public function __construct(
        private readonly EventDispatcherInterface $dispatcher,
    ) {
        $this->kernel32 = new Kernel32();
        $this->user32 = new User32();
        $this->dwm = new DesktopWindowManager();
        $this->dialog = new Dialog();
        $this->controls = new Control32();

        $this->text = new Text();

        $this->instanceFactory = new InstanceFactory($this->kernel32);
        $this->classFactory = new WindowClassFactory($this->user32, $this->dispatcher, $this->text);
        $this->windowFactory = new WindowFactory(
            $this->user32,
            $this->dialog,
            $this->controls,
            $this->dispatcher,
            $this->text,
        );
    }

    public function create(string $title): WindowInterface
    {
        $instance = $this->instanceFactory->create();

        return $this->windowFactory->create(
            instance: $instance,
            class: $this->classFactory->create($instance),
            title: $title,
        );
    }
}
