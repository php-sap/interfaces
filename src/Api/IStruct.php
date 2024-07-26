<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\interfaces\exceptions\IArrayElementMissingException;
use phpsap\interfaces\exceptions\IInvalidArgumentException;

/**
 * Interface IStruct
 *
 * API struct containing an associative array as named members.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IStruct extends IApiElement
{
    /**
     * API element that casts to an associative array in PHP.
     */
    public const TYPE_STRUCT = 'struct';

    /**
     * JSON configuration key for members array.
     */
    public const JSON_MEMBERS = 'members';

    /**
     * Initialize this class from an array.
     * @param  array<string, string|bool|array<int, array<string, string>>> $array  Array containing the properties of this class.
     * @throws IInvalidArgumentException
     */
    public function __construct(array $array);

    /**
     * Create an instance of this class.
     * @param  string  $name  API struct name.
     * @param  string  $direction  Either input or output
     * @param  bool  $isOptional  Is the API struct optional?
     * @param  IMember[]  $members  Array of members of the struct.
     * @return IStruct
     * @throws IInvalidArgumentException
     */
    public static function create(string $name, string $direction, bool $isOptional, array $members): IStruct;

    /**
     * Returns an array of members.
     * @return IMember[]
     */
    public function getMembers(): array;

    /**
     * Cast the values of a given array according to the members of this class.
     * @param array<string, mixed> $value The array to typecast.
     * @return array<string, mixed>
     * @throws IArrayElementMissingException
     * @throws IInvalidArgumentException
     */
    public function cast(array $value): array;
}
