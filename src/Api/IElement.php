<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IElement
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IElement
{
    /**
     * API input element.
     */
    const DIRECTION_INPUT = 'input';

    /**
     * API output element.
     */
    const DIRECTION_OUTPUT = 'output';

    /**
     * API table element.
     */
    const DIRECTION_TABLE = 'table';

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
     * The name of the element.
     * @return string
     */
    public function getName();

    /**
     * The description of the element, in case it exists.
     * @return string
     */
    public function getDescription();

    /**
     * Is the element optional?
     * @return bool
     */
    public function isOptional();

    /**
     * The PHP type of the element.
     * @return string
     */
    public function getType();

    /**
     * Get the direction of the parameter.
     * interface.
     * @return string
     */
    public function getDirection();

    /**
     * Cast a given value to the implemented value.
     * @param mixed $value
     * @return mixed
     */
    public function cast($value);
}
