<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\DateTime\SapDateInterval;
use phpsap\DateTime\SapDateTime;
use phpsap\interfaces\exceptions\IInvalidArgumentException;

/**
 * Interface IValue
 *
 * API values extend the logic of an element. They describe primitive values,
 * like integers, booleans, strings, etc., but also more complex values, like
 * date and time, or intervals.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IValue extends IElement
{
    /**
     * API element that casts to PHP string.
     */
    public const TYPE_STRING = 'string';

    /**
     * API element that casts to PHP int.
     */
    public const TYPE_INTEGER = 'int';

    /**
     * API element that casts to PHP bool.
     */
    public const TYPE_BOOLEAN = 'bool';

    /**
     * API element that casts to PHP float.
     */
    public const TYPE_FLOAT = 'float';

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
     * Cast a given output value to the implemented value.
     * @param bool|int|float|string $value The output to typecast.
     * @return bool|int|float|string|SapDateTime|SapDateInterval
     * @throws IInvalidArgumentException
     */
    public function cast(bool|int|float|string $value): bool|int|float|string|SapDateTime|SapDateInterval;
}
