<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\interfaces\Util\IJsonSerializable;

/**
 * Interface IApiElement
 * Common interface for elements of an API: IValue, IStruct and ITable.
 */
interface IApiElement extends IJsonSerializable
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
     * JSON configuration key for direction value.
     */
    public const JSON_DIRECTION = 'direction';

    /**
     * JSON configuration key for is optional flag.
     */
    public const JSON_OPTIONAL = 'optional';

    /**
     * API input element.
     */
    public const DIRECTION_INPUT = 'input';

    /**
     * API output element.
     */
    public const DIRECTION_OUTPUT = 'output';


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
