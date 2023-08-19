<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

interface CursorID
{
    public const IDC_ARROW           = 32512;
    public const IDC_IBEAM           = 32513;
    public const IDC_WAIT            = 32514;
    public const IDC_CROSS           = 32515;
    public const IDC_UPARROW         = 32516;
    public const IDC_SIZE            = 32640;  /* OBSOLETE: use IDC_SIZEALL */
    public const IDC_ICON            = 32641;  /* OBSOLETE: use IDC_ARROW */
    public const IDC_SIZENWSE        = 32642;
    public const IDC_SIZENESW        = 32643;
    public const IDC_SIZEWE          = 32644;
    public const IDC_SIZENS          = 32645;
    public const IDC_SIZEALL         = 32646;
    public const IDC_NO              = 32648; /*not in win3.1 */
    public const IDC_HAND            = 32649;
    public const IDC_APPSTARTING     = 32650; /*not in win3.1 */
    public const IDC_HELP            = 32651;
    public const IDC_PIN             = 32671;
    public const IDC_PERSON          = 32672;
}
