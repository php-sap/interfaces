<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IValue
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IValue
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
     * API element that casts to PHP array.
     */
    const TYPE_ARRAY = 'array';

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
     * @return mixed
     */
    public function cast($value);
}
