<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use DateInterval;
use DateTime;
use phpsap\interfaces\exceptions\IInvalidArgumentException;

/**
 * Interface IValue
 *
 * API single value.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IValue extends IApiElement
{
    /**
     * API element that casts to PHP bool.
     */
    public const TYPE_BOOLEAN = 'bool';

    /**
     * API element that casts to PHP int.
     */
    public const TYPE_INTEGER = 'int';

    /**
     * API element that casts to PHP float.
     */
    public const TYPE_FLOAT = 'float';

    /**
     * API element that casts to PHP string.
     */
    public const TYPE_STRING = 'string';

    /**
     * API element that casts to a hexadecimal encoded binary to a binary.
     * (direction: output)
     */
    public const TYPE_HEXBIN = 'hexbin';

    /**
     * API date element that casts to a DateTime object.
     */
    public const TYPE_DATE = 'date';

    /**
     * API time element that casts to a DateTime object.
     */
    public const TYPE_TIME = 'time';

    /**
     * API virtual timestamp element (e.g. string) that casts to a DateTime object.
     */
    public const TYPE_TIMESTAMP = 'timestamp';

    /**
     * API virtual calendar week element (e.g. string) that casts to a DateTime object.
     */
    public const TYPE_WEEK = 'week';

    /**
     * Initialize this class from an array.
     * @param  array<string, string|bool>  $array  Array containing the properties of this class.
     * @throws IInvalidArgumentException
     */
    public function __construct(array $array);

    /**
     * Create an instance of this class.
     * @param  string  $type  Either bool or in or float or ...
     * @param  string  $name  API value name.
     * @param  string  $direction  Either input or output.
     * @param  bool  $isOptional  Is the API value optional?
     * @return IValue
     * @throws IInvalidArgumentException
     */
    public static function create(string $type, string $name, string $direction, bool $isOptional): IValue;

    /**
     * Cast a given value according to this class.
     * @param  float|bool|int|string  $value The value to typecast.
     * @return null|bool|int|float|string|DateTime|DateInterval
     * @throws IInvalidArgumentException
     */
    public function cast(null|bool|int|float|string $value): null|bool|int|float|string|DateTime|DateInterval;
}
