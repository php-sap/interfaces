<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IValue
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IValue extends IElement
{
    /**
     * Cast a given value to the implemented value.
     * @param mixed $value
     * @return mixed
     */
    public function cast($value);
}
