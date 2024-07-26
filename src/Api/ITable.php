<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\interfaces\exceptions\IArrayElementMissingException;
use phpsap\interfaces\exceptions\IInvalidArgumentException;

/**
 * Interface ITable
 *
 * API table containing an array of associative arrays as columns of a table.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface ITable extends IApiElement
{
    /**
     * API element that casts to a PHP array of associative arrays.
     */
    public const TYPE_TABLE = 'table';

    /**
     * API table element.
     */
    public const DIRECTION_TABLE = 'table';

    /**
     * JSON configuration key for members array.
     */
    public const JSON_MEMBERS = 'members';

    /**
     * Initialize this class from an array.
     * @param  array<string, string|bool|array<int, array<string, string>>>  $array  Array containing the properties of this class.
     * @throws IInvalidArgumentException
     */
    public function __construct(array $array);

    /**
     * Create an instance of this class.
     * @param  string  $name  API table name.
     * @param  string  $direction  Either input or output or table
     * @param  bool  $isOptional  Is the API table optional?
     * @param  IMember[]  $members  Array of members as columns of the table.
     * @return ITable
     * @throws IInvalidArgumentException
     */
    public static function create(string $name, string $direction, bool $isOptional, array $members): ITable;

    /**
     * Returns an array of an array of members.
     * @return IMember[]
     */
    public function getMembers(): array;

    /**
     * Cast the values of a given array according to the members of this class.
     * @param array<int, array<string, mixed>> $value The array to typecast.
     * @return array<int, array<string, mixed>>
     * @throws IArrayElementMissingException
     * @throws IInvalidArgumentException
     */
    public function cast(array $value): array;
}
