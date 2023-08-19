<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver\PE\OptionalHeader;

final class DataDirectories
{
    /**
     * The export table address and size (.edata).
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#the-edata-section-image-only
     *
     * @var DataDirectory
     */
    public DataDirectory $export;

    /**
     * The import table address and size (.idata).
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#the-idata-section
     *
     * @var DataDirectory
     */
    public DataDirectory $import;

    /**
     * The resource table address and size (.rsrc).
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#the-rsrc-section
     *
     * @var DataDirectory
     */
    public DataDirectory $resource;

    /**
     * The exception table address and size (.pdata).
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#the-pdata-section
     *
     * @var DataDirectory
     */
    public DataDirectory $exception;

    /**
     * The attribute certificate table address and size.
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#the-attribute-certificate-table-image-only
     *
     * @var DataDirectory
     */
    public DataDirectory $security;

    /**
     * The base relocation table address and size (.reloc).
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#the-reloc-section-image-only
     *
     * @var DataDirectory
     */
    public DataDirectory $baseRelocationTable;

    /**
     * The debug data starting address and size (.debug).
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#the-debug-section
     *
     * @var DataDirectory
     */
    public DataDirectory $debugDirectory;

    /**
     * Reserved, must be empty.
     *
     * @var DataDirectory
     */
    public DataDirectory $copyrightOrArchitectureSpecificData;

    /**
     * The RVA of the value to be stored in the global pointer register.
     * The size member of this structure must be set to 0.
     *
     * @var DataDirectory
     */
    public DataDirectory $globalPtr;

    /**
     * The thread local storage (TLS) table address and size (.tls).
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#the-tls-section
     *
     * @var DataDirectory
     */
    public DataDirectory $tlsDirectory;

    /**
     * The load configuration table address and size.
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#the-load-configuration-structure-image-only
     *
     * @var DataDirectory
     */
    public DataDirectory $loadConfigurationDirectory;

    /**
     * The bound import table address and size.
     *
     * @var DataDirectory
     */
    public DataDirectory $boundImportDirectory;

    /**
     * The import address table address and size.
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#import-address-table
     *
     * @var DataDirectory
     */
    public DataDirectory $importAddressTable;

    /**
     * The delay import descriptor address and size.
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#delay-load-import-tables-image-only
     *
     * @var DataDirectory
     */
    public DataDirectory $delayLoadImportDescriptors;

    /**
     * The CLR runtime header address and size (.cormeta).
     *
     * @see https://docs.microsoft.com/en-us/windows/win32/debug/pe-format#the-cormeta-section-object-only
     *
     * @var DataDirectory
     */
    public DataDirectory $comRuntimeDescriptor;

    /**
     * Reserved, must be empty.
     *
     * @var DataDirectory
     */
    public DataDirectory $reserved;

    /**
     * DataDirectories constructor.
     */
    public function __construct()
    {
        $this->export = new DataDirectory();
        $this->import = new DataDirectory();
        $this->resource = new DataDirectory();
        $this->exception = new DataDirectory();
        $this->security = new DataDirectory();
        $this->baseRelocationTable = new DataDirectory();
        $this->debugDirectory = new DataDirectory();
        $this->copyrightOrArchitectureSpecificData = new DataDirectory();
        $this->globalPtr = new DataDirectory();
        $this->tlsDirectory = new DataDirectory();
        $this->loadConfigurationDirectory = new DataDirectory();
        $this->boundImportDirectory = new DataDirectory();
        $this->importAddressTable = new DataDirectory();
        $this->delayLoadImportDescriptors = new DataDirectory();
        $this->comRuntimeDescriptor = new DataDirectory();
        $this->reserved = new DataDirectory();
    }
}
