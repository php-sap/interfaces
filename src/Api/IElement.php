<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\DateTime\SapDateInterval;
use phpsap\DateTime\SapDateTime;
use phpsap\interfaces\exceptions\IInvalidArgumentException;
use phpsap\interfaces\Util\IJsonSerializable;

/**
 * Interface IElement
 *
 * API elements build the basis for API values, structs and tables. They have a
 * name, a type, a direction and an optional flag. However, they don't contain
 * any values.
 *
 * @package phpsap\interfaces\Api
 * @author  Gregor J.
 * @license MIT
 */
interface IElement extends IJsonSerializable
{
    /**
     * JSON configuration key for type value.
     */
    public const JSON_TYPE = 'type';

    /**
     * JSON configuration key for name value.
     */
    public const JSON_NAME = 'name';

    /**
     * API input element.
     */
    public const DIRECTION_INPUT = 'input';

    /**
     * API output element.
     */
    public const DIRECTION_OUTPUT = 'output';

    /**
     * JSON configuration key for direction value.
     */
    public const JSON_DIRECTION = 'direction';

    /**
     * JSON configuration key for is optional flag.
     */
    public const JSON_OPTIONAL = 'optional';

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
}
