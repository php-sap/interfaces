<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\interfaces\exceptions\IArrayElementMissingException;
use phpsap\interfaces\exceptions\IInvalidArgumentException;
use phpsap\interfaces\Util\IJsonSerializable;

/**
 * Interface IStruct
 *
 * API struct containing an associative array as named members.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IStruct extends IJsonSerializable
{
    /**
     * API element that casts to an associative array in PHP.
     */
    public const TYPE_STRUCT = 'struct';

    /**
     * API input element.
     */
    public const DIRECTION_INPUT = 'input';

    /**
     * API output element.
     */
    public const DIRECTION_OUTPUT = 'output';

    /**
     * JSON configuration key for type value.
     */
    public const JSON_TYPE = 'type';

    /**
     * JSON configuration key for name value.
     */
    public const JSON_NAME = 'name';

    /**
     * JSON configuration key for direction value.
     */
    public const JSON_DIRECTION = 'direction';

    /**
     * JSON configuration key for is optional flag.
     */
    public const JSON_OPTIONAL = 'optional';

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
     * The PHP type of the element.
     * @return string
     */
    public function getType(): string;

    /**
     * The name of the element.
     * @return string
     */
    public function getName(): string;

    /**
     * Get the direction of the parameter.
     * interface.
     * @return string
     */
    public function getDirection(): string;

    /**
     * Is the element optional?
     * @return bool
     */
    public function isOptional(): bool;

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
