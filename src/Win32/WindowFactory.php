<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use Serafim\LibExportView\Exception\WindowCreationException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class WindowFactory
{
    private const DEFAULT_EX_WINDOW_STYLE = WindowExtendedStyle::WS_EX_TOPMOST
                                          | WindowExtendedStyle::WS_EX_LTRREADING;

    private const DEFAULT_WINDOW_STYLE = WindowStyle::WS_CAPTION
                                       | WindowStyle::WS_OVERLAPPEDWINDOW
                                       | WindowStyle::WS_SYSMENU;

    private const CW_USER_DEFAULT = 0x8000_0000;

    public function __construct(
        private readonly User32 $user32,
        private readonly Dialog $dialog,
        private readonly Control32 $controls,
        private readonly EventDispatcherInterface $dispatcher,
        private readonly Text $text = new Text(),
    ) {}

    public function create(InstanceHandle $instance, WindowClass $class, string $title): Win32Window
    {
        $hWindow = $this->user32->CreateWindowExW(
            /* DWORD     dwExStyle    */ self::DEFAULT_EX_WINDOW_STYLE,
            /* LPCSTR    lpClassName  */ $this->text->wide($class->id, owned: false),
            /* LPCSTR    lpWindowName */ $this->text->wide($title, owned: false),
            /* DWORD     dwStyle      */ self::DEFAULT_WINDOW_STYLE,
            /* int       X            */ self::CW_USER_DEFAULT,
            /* int       Y            */ self::CW_USER_DEFAULT,
            /* int       nWidth       */ 800,
            /* int       nHeight      */ 600,
            /* HWND      hWndParent   */ null,
            /* HMENU     hMenu        */ null,
            /* HINSTANCE hInstance    */ $instance->ptr,
            /* LPVOID    lpPara       */ null
        );

        if ($hWindow === null) {
            throw WindowCreationException::fromClassName($class->id);
        }

        return new Win32Window(
            user32: $this->user32,
            dialog: $this->dialog,
            controls: $this->controls,
            handle: new WindowHandle(
                user32: $this->user32,
                ptr: $hWindow,
                class: $class,
            ),
            dispatcher: $this->dispatcher,
            text: $this->text,
        );
    }
}
