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
