<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE\OptionalHeader;

/**
 * Each data directory gives the address and size of a table or string that
 * Windows uses. These data directory entries are all loaded into memory so
 * that the system can use them at run time. A data directory is an 8-byte
 * field that has the following declaration:
 *
 * <code>
 *  typedef struct _IMAGE_DATA_DIRECTORY {
 *      DWORD   VirtualAddress;
 *      DWORD   Size;
 *  }
 *      IMAGE_DATA_DIRECTORY,
 *      * PIMAGE_DATA_DIRECTORY
 *  ;
 * </code>
 */
final class DataDirectory
{
    /**
     * @var positive-int|0
     */
    public int $virtualAddress = 0;

    /**
     * @var positive-int|0
     */
    public int $size = 0;
}
