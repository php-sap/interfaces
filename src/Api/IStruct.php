<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IStruct
 *
 * API extend the logic of arrays to contain member elements.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IStruct extends IArray
{
    /**
     * API element that casts to an associative array in PHP.
     */
    const TYPE_STRUCT = 'struct';
}
