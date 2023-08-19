<?php

declare(strict_types=1);

namespace Serafim\LibExportView\Win32;

interface DwmWindowCornerPreference
{
    /*
     * Let the system decide whether or not to round window corners
     */
    public const DWMWCP_DEFAULT = 0;

    /*
     * Never round window corners
     */
    public const DWMWCP_DONOTROUND = 1;

    /*
     * Round the corners if appropriate
     */
    public const DWMWCP_ROUND = 2;

    /*
     * Round the corners if appropriate, with a small radius
     */
    public const DWMWCP_ROUNDSMALL = 3;
}
