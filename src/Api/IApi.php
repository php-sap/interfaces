<?php

namespace phpsap\interfaces\Api;

use phpsap\interfaces\Util\IJsonSerializable;

/**
 * Interface IApi
 *
 * Describes the SAP remote function API. To be precise it describes the SAP remote
 * function call parameters (input), the returns (output) and the tables (input/
 * output).
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IApi extends IJsonSerializable
{
    /**
     * Add a value, struct or table of the remote function.
     * @param \phpsap\interfaces\Api\IValue $value
     * @return $this
     */
    public function add(IValue $value);

    /**
     * Get all input values of the remote function.
     * @return \phpsap\interfaces\Api\IValue[]
     */
    public function getInputValues();

    /**
     * Get all output values of the remote function.
     * @return \phpsap\interfaces\Api\IValue[]
     */
    public function getOutputValues();

    /**
     * Get all tables of the remote function.
     * @return \phpsap\interfaces\Api\ITable[]
     */
    public function getTables();
}
