<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IValue
 *
 * API values have a direction (input, output or table) and an optional flag, unlike
 * elements.
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
    const DIRECTION_INPUT = 'input';

    /**
     * API output element.
     */
    const DIRECTION_OUTPUT = 'output';

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
