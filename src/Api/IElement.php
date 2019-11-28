<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IElement
 *
 * API elements are struct or table members and have no direction or optional flag
 * of their own.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IElement extends \JsonSerializable
{
    /**
     * API element that casts to PHP string.
     */
    const TYPE_STRING = 'string';

    /**
     * API element that casts to PHP int.
     */
    const TYPE_INTEGER = 'int';

    /**
     * API element that casts to PHP bool.
     */
    const TYPE_BOOLEAN = 'bool';

    /**
     * API element that casts to PHP float.
     */
    const TYPE_FLOAT = 'float';

    /**
     * API element that casts to a hexadecimal encoded binary to a binary.
     * (direction: output)
     */
    const TYPE_HEXBIN = 'hexbin';

    /**
     * API date element that casts to a DateTime object.
     */
    const TYPE_DATE = 'date';

    /**
     * API time element that casts to a DateTime object.
     */
    const TYPE_TIME = 'time';

    /**
     * API virtual timestamp element (e.g. string) that casts to a DateTime object.
     */
    const TYPE_TIMESTAMP = 'timestamp';

    /**
     * API virtual calendar week element (e.g. string) that casts to a DateTime object.
     */
    const TYPE_WEEK = 'week';

    /**
     * JSON configuration key for type value.
     */
    const JSON_TYPE = 'type';

    /**
     * JSON configuration key for name value.
     */
    const JSON_NAME = 'name';

    /**
     * The PHP type of the element.
     * @return string
     */
    public function getType();

    /**
     * The name of the element.
     * @return string
     */
    public function getName();

    /**
     * Cast a given output value to the implemented value.
     * @param bool|int|float|string $value The output to typecast.
     * @return bool|int|float|string|\phpsap\DateTime\SapDateTime
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function cast($value);

    /**
     * Decode a formerly JSON encoded IElement object.
     * @param string $json JSON encoded IElement object.
     * @return \phpsap\interfaces\IElement
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public static function jsonDecode($json);
}
