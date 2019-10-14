<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IArray
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IArray extends IElement
{
    /**
     * Return an array of member elements.
     * @return array
     */
    public function getMembers();
}
