<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

use FFI\CData;
use Serafim\LibExportView\Event\WindowCloseEvent;
use Serafim\LibExportView\Event\WindowMenuMessageEvent;
use Serafim\LibExportView\Event\WindowMenuMessageEvent as MenuMessage;
use Serafim\LibExportView\Event\WindowResizeEvent;
use Serafim\LibExportView\Exception\IconNotLoadableException;
use Serafim\LibExportView\Exception\IconNotReadableException;
use Serafim\LibExportView\SymbolResolver\Factory;
use Serafim\LibExportView\WindowInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class Win32Window implements WindowInterface
{
    /**
     * @var CData|\PHPSTORM_META\Message
     */
    private readonly CData $message;

    private bool $running = false;

    /**
     * @var array<non-empty-string, callable>
     */
    private array $listeners = [];

    private Factory $reader;

    private readonly CData $list;

    public function __construct(
        private readonly User32 $user32,
        private readonly Dialog $dialog,
        private readonly Control32 $controls,
        private readonly WindowHandle $handle,
        private readonly EventDispatcherInterface $dispatcher,
        private readonly Text $text = new Text(),
    ) {
        $this->reader = new Factory();

        $this->message = $this->user32->new('MSG', false);

        $this->listeners = [
            WindowCloseEvent::class => $this->doClose(...),
            WindowMenuMessageEvent::class => $this->onMenuMessage(...),
            WindowResizeEvent::class => $this->onResize(...),
        ];

        foreach ($this->listeners as $event => $listener) {
            $this->dispatcher->addListener($event, $listener);
        }

        $panel = $this->user32->CreateMenu();
        {
            $file = $this->user32->CreateMenu();
            {
                $this->user32->AppendMenuA(
                    $file,
                    MenuFlag::MF_STRING,
                    WindowMenuMessageEvent::ID_LOAD_FUNCTIONS,
                    'Load Functions',
                );
                $this->user32->AppendMenuA(
                    $file,
                    MenuFlag::MF_SEPARATOR,
                    0,
                    null,
                );
                $this->user32->AppendMenuA(
                    $file,
                    MenuFlag::MF_STRING,
                    WindowMenuMessageEvent::ID_EXIT,
                    'Exit',
                );
            }

            $help = $this->user32->CreateMenu();
            {
                $this->user32->AppendMenuA(
                    $help,
                    MenuFlag::MF_STRING,
                    WindowMenuMessageEvent::ID_ABOUT,
                    'About',
                );
            }

            $this->user32->AppendMenuA(
                $panel,
                MenuFlag::MF_POPUP,
                $file,
                'File',
            );

            // $this->user32->AppendMenuA(
            //     $panel,
            //     MenuFlag::MF_POPUP,
            //     $help,
            //     'Help',
            // );
        }
        $this->user32->SetMenu($this->handle->ptr, $panel);

        $this->list = $this->createListView();

        $this->loadFunctionsList();
    }

    private function listViewInsertColumn(CData $hwnd, int $column, CData $pCol): void
    {
        $this->user32->SendMessageA(
            $hwnd,
            0x1000 + 27,
            $column,
            $pCol,
        );
    }

    private function listViewDeleteAll(CData $hwnd): void
    {
        $this->user32->SendMessageA(
            $hwnd,
            0x1000 + 9,
            0,
            null,
        );
    }

    private function listViewInsertItem(CData $hwnd, int $column, CData $pCol): void
    {
        $this->user32->SendMessageA(
            $hwnd,
            0x1000 + 7,
            $column,
            $pCol,
        );
    }

    private function listViewSetItemText(CData $hwnd, int $column, CData $pCol): void
    {
        $this->user32->SendMessageA(
            $hwnd,
            0x1000 + 46,
            $column,
            $pCol,
        );
    }

    private function onResize(): void
    {
        $rect = $this->user32->new('RECT');

        $this->user32->GetClientRect($this->handle->ptr, \FFI::addr($rect));

        if (isset($this->list)) {
            $this->user32->SetWindowPos(
                $this->list,
                null,
                0,
                0,
                $rect->right - $rect->left,
                $rect->bottom - $rect->top,
                0,
            );
        }
    }

    private function onMenuMessage(WindowMenuMessageEvent $e): void
    {
        switch ($e->id) {
            case MenuMessage::ID_EXIT:
                $this->close();
                break;
            case MenuMessage::ID_ABOUT:
                fwrite(\STDERR, 'about');
                break;
            case MenuMessage::ID_LOAD_FUNCTIONS:
                $this->loadFunctionsList();
                break;
        }
    }

    private function selectFile(array $filters = []): string
    {
        $path = $this->dialog->new('TCHAR[260]', false);

        $ofn = $this->dialog->new('OPENFILENAMEW');
        $ofn->lStructSize = \FFI::sizeof($ofn);
        $ofn->lpstrFile = $path;
        $ofn->hwndOwner = $this->handle->ptr;
        $ofn->nMaxFile = \FFI::sizeof($path);
        $ofn->lpstrFilter = $this->text->wide(\implode(',', $filters), owned: false);
        $ofn->nFilterIndex = 1;
        $ofn->Flags = 0x00000800 | 0x00001000;

        $this->dialog->GetOpenFileNameW(\FFI::addr($ofn));

        return $this->text->decode(\FFI::string($ofn->lpstrFile, $ofn->nMaxFile));
    }

    private function createListView(): CData
    {
        $rect = $this->user32->new('RECT');
        $this->user32->GetClientRect($this->handle->ptr, \FFI::addr($rect));

        $icex = $this->controls->new('INITCOMMONCONTROLSEX');
        $icex->dwICC = InitCommonControl::ICC_LISTVIEW_CLASSES;

        $this->controls->InitCommonControlsEx(\FFI::addr($icex));

        $result = $this->user32->CreateWindowExA(
            /* DWORD     dwExStyle    */ 0,
            /* LPCSTR    lpClassName  */ $this->text->ansi('SysListView32', owned: false),
            /* LPCSTR    lpWindowName */ $this->text->ansi('', owned: false),
            /* DWORD     dwStyle      */ WindowStyle::WS_CHILD|WindowStyle::WS_VISIBLE|WindowStyle::WS_BORDER|0x0001|0x0200,
            /* int       X            */ 0,
            /* int       Y            */ 0,
            /* int       nWidth       */ $rect->right - $rect->left,
            /* int       nHeight      */ $rect->bottom - $rect->top,
            /* HWND      hWndParent   */ $this->handle->ptr,
            /* HMENU     hMenu        */ -1,
            /* HINSTANCE hInstance    */ $this->handle->class->instance->ptr,
            /* LPVOID    lpPara       */ null
        );

        $lvc = $this->user32->new('LVCOLUMNA');
        $lvc->mask = 0x0001 | 0x0002 | 0x0004 | 0x0008;

        $index = 0;
        foreach (['ID' => 90, 'Function Name' => 400, 'Address' => 80, 'Filename' => 100, 'Full Path' => 2000] as $title => $width) {
            $lvc->iSubItem = $index++;
            $lvc->pszText = $this->text->ansi($title, false);
            $lvc->cx = $width;
            $lvc->fmt = $index ? 0 : 1;
            $this->listViewInsertColumn($result, $index, \FFI::addr($lvc));
        }

        return $result;
    }

    private function loadFunctionsList(): void
    {
        $pathname = $this->selectFile(['*.dll', '*.exe']);

        if ($pathname === '') {
            return;
        }

        $resolver = $this->reader->fromPathname($pathname);
        $filename = \basename($pathname);

        $this->listViewDeleteAll($this->list);

        $item = $this->user32->new('LVITEMA');
        $item->mask = 0x00000001 | 0x00000008;

        foreach ($resolver as $i => $function) {
            $item->iItem = $i;

            $id = \sprintf('%d (0x%04X)', $i, $i);
            $item->pszText = $this->text->ansi($id, false);
            $item->iSubItem = 0;
            $this->listViewInsertItem($this->list, 0, \FFI::addr($item));

            $item->pszText = $this->text->ansi($function->name, false);
            $item->iSubItem = 1;
            $this->listViewSetItemText($this->list, $i, \FFI::addr($item));

            $addr = \sprintf('0x%08X', $function->addr);
            $item->pszText = $this->text->ansi($addr, false);
            $item->iSubItem = 2;
            $this->listViewSetItemText($this->list, $i, \FFI::addr($item));

            $item->pszText = $this->text->ansi($filename, false);
            $item->iSubItem = 3;
            $this->listViewSetItemText($this->list, $i, \FFI::addr($item));

            $item->pszText = $this->text->ansi($pathname, false);
            $item->iSubItem = 4;
            $this->listViewSetItemText($this->list, $i, \FFI::addr($item));
        }
    }

    public function setTitle(string $title): void
    {
        $this->user32->SetWindowTextW($this->handle->ptr, $this->text->wide($title));
    }

    public function show(): void
    {
        $this->user32->ShowWindow($this->handle->ptr, ShowWindowCommand::SW_SHOW);
    }

    public function hide(): void
    {
        $this->user32->ShowWindow($this->handle->ptr, ShowWindowCommand::SW_HIDE);
    }

    /**
     * @param \SplFileInfo $file
     */
    public function setIcon(\SplFileInfo $file): void
    {
        $image = $this->loadImage($file, 32, ImageType::IMAGE_ICON);
        $param = $this->user32->cast('LPARAM', $image);
        $this->user32->SendMessageW($this->handle->ptr, WindowMessage::WM_SETICON, IconSize::ICON_SMALL, \FFI::addr($param));

        $image = $this->loadImage($file, 256, ImageType::IMAGE_ICON);
        $param = $this->user32->cast('LPARAM', $image);
        $this->user32->SendMessageW($this->handle->ptr, WindowMessage::WM_SETICON, IconSize::ICON_BIG, \FFI::addr($param));
    }

    /**
     * @param int<0, max> $size
     * @param ImageType::IMAGE_* $type
     */
    private function loadImage(\SplFileInfo $file, int $size, int $type): CData
    {
        $region = ImageLoadRegion::LR_LOADFROMFILE;

        if (!$file->isFile() || !$file->isReadable()) {
            throw IconNotReadableException::fromPathname($file->getPathname());
        }

        $path = $this->text->wide($file->getPathname(), owned: false);

        try {
            $image = $this->user32->LoadImageW($this->handle->class->instance->ptr, $path, $type, $size, $size, $region);

            if ($image === null) {
                throw IconNotLoadableException::fromPathname($file->getPathname());
            }

            return $image;
        } finally {
            \FFI::free(\FFI::addr($path));
        }
    }

    public static function loWord(int $value): int
    {
        return ($value &= 0xffff) > 32_767 ? $value - 65_535 : $value;
    }

    /**
     * <code>
     *  (unsigned short)((unsigned long)value >> 16) & 0xffff
     * </code>
     */
    public static function hiWord(int $value): int
    {
        $value = ($value >> 16) & 0xffff;

        return $value > 32_767 ? $value - 65_535 : $value;
    }

    public function run(): void
    {
        if ($this->running === true) {
            return;
        }

        $this->running = true;

        while ($this->running) {
            $ptr = \FFI::addr($this->message);

            if ($this->user32->PeekMessageW($ptr, $this->handle->ptr, 0, 0, 1)) {
                $this->user32->TranslateMessage($ptr);
                $this->user32->DispatchMessageW($ptr);
            }

            \usleep(1);
        }
    }

    private function doClose(): void
    {
        foreach ($this->listeners as $event => $listener) {
            $this->dispatcher->removeListener($event, $listener);
        }

        $this->running = false;
    }

    public function close(): void
    {
        $this->dispatcher->dispatch(new WindowCloseEvent());

        $this->doClose();
    }
}
