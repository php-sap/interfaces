<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\interfaces\exceptions\IArrayElementMissingException;
use phpsap\interfaces\exceptions\IInvalidArgumentException;

/**
 * Interface IArray
 *
 * API arrays extend the logic of elements to contain member elements. They are
 * the basis for structs and tables.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IArray extends IElement
{
    /**
     * JSON configuration key for members array.
     */
    public const JSON_MEMBERS = 'members';

    /**
     * Cast a given output value to the implemented value.
     * @param array<int|string, mixed> $value The output array to typecast.
     * @return array<int|string, mixed>
     * @throws IArrayElementMissingException
     * @throws IInvalidArgumentException
     */
    public function cast(array $value): array;

    /**
     * Return an array of member elements.
     * @return IElement[]
     */
    public function getMembers(): array;
}
