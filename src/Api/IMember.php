<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\DateTime\SapDateInterval;
use phpsap\DateTime\SapDateTime;
use phpsap\interfaces\exceptions\IInvalidArgumentException;
use phpsap\interfaces\Util\IJsonSerializable;

/**
 * Interface IMember
 *
 * API struct or table member.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IMember extends IJsonSerializable
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
     * JSON configuration key for type value.
     */
    public const JSON_TYPE = 'type';

    /**
     * JSON configuration key for name value.
     */
    public const JSON_NAME = 'name';

    /**
     * Initialize this class from an array.
     * @param  array<string, string>  $array  Array containing the properties of this class.
     * @throws IInvalidArgumentException
     */
    public function __construct(array $array);

    /**
     * Create an instance of this class.
     * @param  string  $type  Member type. Use TYPE_* constants.
     * @param  string  $name  API struct or table member name.
     * @return IMember
     * @throws IInvalidArgumentException
     */
    public static function create(string $type, string $name): IMember;

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
     * Cast a value according to this class.
     * @param  float|bool|int|string  $value The output to typecast.
     * @return bool|int|float|string|SapDateTime|SapDateInterval
     * @throws IInvalidArgumentException
     */
    public function cast(bool|int|float|string $value): bool|int|float|string|SapDateTime|SapDateInterval;
}
