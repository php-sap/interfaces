<?php

declare(strict_types=1);

namespace phpsap\interfaces\Api;

use phpsap\interfaces\Util\IJsonSerializable;

/**
 * Interface IApi
 *
 * Describes the SAP remote function API. To be precise it describes the SAP
 * remote function call parameters (input), the returns (output), and the tables
 * (input/output/table).
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IApi extends IJsonSerializable
{
    /**
     * Add a value, struct or table of the remote function.
     * @param  IApiElement  $element
     * @return $this
     */
    public function add(IApiElement $element): IApi;

    /**
     * Get all input values of the remote function.
     * @return IApiElement[]
     */
    public function getInputValues(): array;

    /**
     * Get all output values of the remote function.
     * @return IApiElement[]
     */
    public function getOutputValues(): array;

    /**
     * Get all tables of the remote function.
     * @return IApiElement[]
     */
    public function getTables(): array;
}
