<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\interfaces\exceptions\IArrayElementMissingException;
use phpsap\interfaces\exceptions\IInvalidArgumentException;

/**
 * Interface IArray
 *
 * API extend the logic of values to contain member elements.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IArray extends IValue
{
    /**
     * JSON configuration key for members array.
     */
    public const JSON_MEMBERS = 'members';

    /**
     * Cast a given output value to the implemented value.
     * @param array $value The output array to typecast.
     * @return array
     * @throws IArrayElementMissingException
     * @throws IInvalidArgumentException
     */
    public function cast($value): array;

    /**
     * Return an array of member elements.
     * @return IElement[]
     */
    public function getMembers(): array;
}
