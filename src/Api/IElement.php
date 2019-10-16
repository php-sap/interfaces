<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IElement
 *
 * API elements are struct or table values and have no direction or optional flag of
 * their own.
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
     * Cast a given value to the implemented value.
     * @param mixed $value
     * @return bool|int|float|string|array
     */
    public function cast($value);

    /**
     * Decode a formerly JSON encoded IElement object.
     * @param string|\stdClass|array $json
     * @return \phpsap\interfaces\IElement
     */
    public static function jsonDecode($json);
}
