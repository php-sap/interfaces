<?php

namespace phpsap\interfaces\Api;

/**
 * Interface IArray
 *
 * API arrays behave like values but contain elements as members.
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
     * Return an array of member elements.
     * @return array
     */
    public function getMembers();

    /**
     * Add a member to the array.
     * @param \phpsap\interfaces\Api\IElement $member
     * @return \phpsap\interfaces\Api\IArray
     */
    public function addMember(IElement $member);
}
