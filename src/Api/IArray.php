<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IArray
 *
 * API extend the logic of values but contain member elements.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IArray extends IValue
{
    /**
     * API table element.
     */
    const DIRECTION_TABLE = 'table';

    /**
     * API element that casts to PHP array.
     */
    const TYPE_ARRAY = 'array';

    /**
     * JSON configuration key for members array.
     */
    const JSON_MEMBERS = 'members';

    /**
     * Cast a given output value to the implemented value.
     * @param array $struct The output array to typecast.
     * @return array
     * @throws \phpsap\interfaces\exceptions\IArrayElementMissingException
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function cast($struct);

    /**
     * Return an array of member elements.
     * @return \phpsap\interfaces\Api\IElement[]
     */
    public function getMembers();
}
