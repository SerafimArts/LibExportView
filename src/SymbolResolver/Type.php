<?php

declare(strict_types=1);

namespace Serafim\LibExportView\SymbolResolver;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * @psalm-type TypeEnum = Type::TYPE_*
 */
final class Type
{
    /**
     * Signed integer (machine dependent size and byte order)
     *
     * @var string
     */
    public const TYPE_INT = 'i';

    /**
     * Unsigned integer (machine dependent size and byte order)
     *
     * @var string
     */
    public const TYPE_UINT = 'I';

    /**
     * Signed char
     *
     * @var string
     */
    public const TYPE_INT8 = 'c';

    /**
     * Unsigned char
     *
     * @var string
     */
    public const TYPE_UINT8 = 'C';

    /**
     * Signed short (always 16 bit, machine byte order)
     *
     * @var string
     */
    public const TYPE_INT16 = 's';

    /**
     * Unsigned short (always 16 bit, big endian byte order)
     *
     * @var string
     */
    public const TYPE_UINT16_BE = 'n';

    /**
     * Unsigned short (always 16 bit, little endian byte order)
     *
     * @var string
     */
    public const TYPE_UINT16_LE = 'v';

    /**
     * Unsigned short (always 16 bit, machine byte order)
     *
     * @var string
     */
    public const TYPE_UINT16_ME = 'S';

    /**
     * Signed long (always 32 bit, machine byte order)
     *
     * @var string
     */
    public const TYPE_INT32 = 'l';

    /**
     * Unsigned long (always 32 bit, big endian byte order)
     *
     * @var string
     */
    public const TYPE_UINT32_BE = 'N';

    /**
     * Unsigned long (always 32 bit, little endian byte order)
     *
     * @var string
     */
    public const TYPE_UINT32_LE = 'V';

    /**
     * Unsigned long (always 32 bit, machine byte order)
     *
     * @var string
     */
    public const TYPE_UINT32_ME = 'L';

    /**
     * Signed long long (always 64 bit, machine byte order)
     *
     * @var string
     */
    public const TYPE_INT64 = 'q';

    /**
     * Unsigned long long (always 64 bit, big endian byte order)
     *
     * @var string
     */
    public const TYPE_UINT64_BE = 'J';

    /**
     * Unsigned long long (always 64 bit, little endian byte order)
     *
     * @var string
     */
    public const TYPE_UINT64_LE = 'P';

    /**
     * Unsigned long long (always 64 bit, machine byte order)
     *
     * @var string
     */
    public const TYPE_UINT64_ME = 'Q';

    /**
     * Float (machine dependent size, big endian byte order)
     *
     * @var string
     */
    public const TYPE_FLOAT32_BE = 'G';

    /**
     * Float (machine dependent size, little endian byte order)
     *
     * @var string
     */
    public const TYPE_FLOAT32_LE = 'g';

    /**
     * Float (machine dependent size and representation)
     *
     * @var string
     */
    public const TYPE_FLOAT32_ME = 'f';

    /**
     * Double (machine dependent size, big endian byte order)
     *
     * @var string
     */
    public const TYPE_FLOAT64_BE = 'E';

    /**
     * Double (machine dependent size, little endian byte order)
     *
     * @var string
     */
    public const TYPE_FLOAT64_LE = 'e';

    /**
     * Double (machine dependent size and representation)
     *
     * @var string
     */
    public const TYPE_FLOAT64_ME = 'd';

    /**
     * @param TypeEnum $type
     * @return positive-int
     */
    public static function size(
        #[ExpectedValues(valuesFromClass: Type::class)]
        string $type
    ): int {
        switch ($type) {
            case self::TYPE_INT:
            case self::TYPE_UINT:
                return \PHP_INT_SIZE;
            case self::TYPE_INT16:
            case self::TYPE_UINT16_BE:
            case self::TYPE_UINT16_LE:
            case self::TYPE_UINT16_ME:
                return 2;
            case self::TYPE_FLOAT32_BE:
            case self::TYPE_FLOAT32_LE:
            case self::TYPE_FLOAT32_ME:
            case self::TYPE_INT32:
            case self::TYPE_UINT32_BE:
            case self::TYPE_UINT32_LE:
            case self::TYPE_UINT32_ME:
                return 4;
            case self::TYPE_FLOAT64_BE:
            case self::TYPE_FLOAT64_LE:
            case self::TYPE_FLOAT64_ME:
            case self::TYPE_INT64:
            case self::TYPE_UINT64_BE:
            case self::TYPE_UINT64_LE:
            case self::TYPE_UINT64_ME:
                return 8;
            default:
                return 1;
        }
    }
}
