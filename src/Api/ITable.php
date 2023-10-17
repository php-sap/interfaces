<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

/**
 * Interface ITable
 *
 * API extend the logic of arrays but contains rows of member elements.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface ITable extends IArray
{
    /**
     * API table element.
     */
    public const DIRECTION_TABLE = 'table';

    /**
     * API element that casts to a PHP array of associative arrays.
     */
    public const TYPE_TABLE = 'table';
}
