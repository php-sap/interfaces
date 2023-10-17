<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IValue
 *
 * API values extend the logic of an element but have a direction (input or output)
 * and an optional flag, unlike elements.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IValue extends IElement
{
    /**
     * API input element.
     */
    public const DIRECTION_INPUT = 'input';

    /**
     * API output element.
     */
    public const DIRECTION_OUTPUT = 'output';

    /**
     * JSON configuration key for direction value.
     */
    public const JSON_DIRECTION = 'direction';

    /**
     * JSON configuration key for is optional flag.
     */
    public const JSON_OPTIONAL = 'optional';

    /**
     * Get the direction of the parameter.
     * interface.
     * @return string
     */
    public function getDirection();

    /**
     * Is the element optional?
     * @return bool
     */
    public function isOptional();
}
