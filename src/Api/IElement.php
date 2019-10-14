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
    const DIRECTION_IN = 1;
    const DIRECTION_OUT = 2;

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
     * Get the direction of the parameter. See DIRECTION_* constants of this
     * interface.
     * @return int
     */
    public function getDirection();
}
