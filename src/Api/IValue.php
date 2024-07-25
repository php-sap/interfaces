<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\DateTime\SapDateInterval;
use phpsap\DateTime\SapDateTime;
use phpsap\interfaces\exceptions\IInvalidArgumentException;
use phpsap\interfaces\Util\IJsonSerializable;

/**
 * Interface IValue
 *
 * API single value.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IValue extends IJsonSerializable
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
     * API input element.
     */
    public const DIRECTION_INPUT = 'input';

    /**
     * API output element.
     */
    public const DIRECTION_OUTPUT = 'output';

    /**
     * JSON configuration key for type value.
     */
    public const JSON_TYPE = 'type';

    /**
     * JSON configuration key for name value.
     */
    public const JSON_NAME = 'name';

    /**
     * JSON configuration key for direction value.
     */
    public const JSON_DIRECTION = 'direction';

    /**
     * JSON configuration key for is optional flag.
     */
    public const JSON_OPTIONAL = 'optional';

    /**
     * API value constructor.
     * @param string $type Either bool or in or float or ...
     * @param string $name API value name.
     * @param string $direction Either input or output.
     * @param bool $isOptional Is the API value optional?
     * @throws IInvalidArgumentException
     */
    public function __construct(string $type, string $name, string $direction, bool $isOptional);

    /**
     * Create an instance of this class from an array.
     * @param  array<string, string|bool>  $array  Array containing the properties of this class.
     * @return IValue
     * @throws IInvalidArgumentException
     */
    public static function create(array $array): IValue;

    /**
     * The PHP type of the element.
     * @return string
     */
    public function getType(): string;

    /**
     * The name of the element.
     * @return string
     */
    public function getName(): string;

    /**
     * Get the direction of the parameter.
     * interface.
     * @return string
     */
    public function getDirection(): string;

    /**
     * Is the element optional?
     * @return bool
     */
    public function isOptional(): bool;

    /**
     * Cast a given value according to this class.
     * @param  float|bool|int|string  $value The value to typecast.
     * @return bool|int|float|string|SapDateTime|SapDateInterval
     * @throws IInvalidArgumentException
     */
    public function cast(bool|int|float|string $value): bool|int|float|string|SapDateTime|SapDateInterval;
}
