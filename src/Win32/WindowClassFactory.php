<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use FFI\CData;
use Psr\EventDispatcher\EventDispatcherInterface;
use Serafim\LibExportView\Event\WindowBlurEvent;
use Serafim\LibExportView\Event\WindowCloseEvent;
use Serafim\LibExportView\Event\WindowFocusEvent;
use Serafim\LibExportView\Event\WindowMenuMessageEvent;
use Serafim\LibExportView\Event\WindowResizeEvent;
use Serafim\LibExportView\Exception\ClassInitializationException;

final class WindowClassFactory
{
    /**
     * @var int-mask-of<WindowClassStyle::CS_*>
     */
    private const DEFAULT_CLASS_STYLE = WindowClassStyle::CS_HREDRAW
                                      | WindowClassStyle::CS_VREDRAW
                                      | WindowClassStyle::CS_OWNDC;

    public function __construct(
        private readonly User32 $user32,
        private readonly EventDispatcherInterface $dispatcher,
        private readonly Text $text = new Text(),
    ) {
    }

    /**
     * @throws \Exception
     */
    public function create(InstanceHandle $instance): WindowClass
    {
        $id = $this->createWindowClassId();

        return new WindowClass(
            user32: $this->user32,
            id: $id,
            ptr: $this->createClass($instance, $id),
            instance: $instance,
        );
    }

    /**
     * @return non-empty-string
     *
     * @throws \Exception
     */
    private function createWindowClassId(): string
    {
        $uuid = \random_bytes(16);

        $uuid[6] = $uuid[6] & "\x0F" | "\x40";
        $uuid[8] = $uuid[8] & "\x3F" | "\x80";

        $uuid = \bin2hex($uuid);

        return \substr($uuid, 0, 8) . '-'
            . \substr($uuid, 8, 4) . '-'
            . \substr($uuid, 12, 4) . '-'
            . \substr($uuid, 16, 4) . '-'
            . \substr($uuid, 20, 12)
        ;
    }

    private function createClass(InstanceHandle $instance, string $id): CData
    {
        $info = $this->user32->new('WNDCLASSW');

        $info->style = self::DEFAULT_CLASS_STYLE;
        $info->hInstance = $instance->ptr;
        $info->lpszClassName = $this->text->wide($id, owned: false);
        $info->hbrBackground = $this->user32->GetSysColorBrush(Color::COLOR_WINDOW);
        $info->lpfnWndProc = function (CData $hwnd, int $msg, int $wParam, int $lParam): int {
            switch ($msg) {
                case WindowMessage::WM_SIZE:
                    $this->dispatcher->dispatch(new WindowResizeEvent());
                    break;

                case WindowMessage::WM_COMMAND:
                    $this->dispatcher->dispatch(new WindowMenuMessageEvent(
                        id: Win32Window::loWord($wParam),
                    ));
                    break;

                case WindowMessage::WM_CLOSE:
                    $this->dispatcher->dispatch(new WindowCloseEvent());
                    break;

                case WindowMessage::WM_SETFOCUS:
                case WindowMessage::WM_SHOWWINDOW:
                    $this->dispatcher->dispatch(new WindowFocusEvent());
                    break;

                case WindowMessage::WM_KILLFOCUS:
                    $this->dispatcher->dispatch(new WindowBlurEvent());
                    break;

                case WindowMessage::WM_GETMINMAXINFO:
                    $info = $this->user32->cast('LPMINMAXINFO', $lParam);
                    $info->ptMinTrackSize->x = 640;
                    $info->ptMinTrackSize->y = 480;
                    break;
            }

            return $this->user32->DefWindowProcW($hwnd, $msg, $wParam, $lParam);
        };

        if (!$this->user32->RegisterClassW(\FFI::addr($info))) {
            throw ClassInitializationException::fromClassName($id);
        }

        return $info;
    }
}
