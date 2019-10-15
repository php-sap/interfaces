<?php

namespace phpsap\interfaces;

use phpsap\interfaces\Api\IArray;
use phpsap\interfaces\Api\IValue;

/**
 * Interface IApi
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IApi extends \JsonSerializable
{
    /**
     * Add an input value of the remote function.
     * @param \phpsap\interfaces\Api\IValue $value
     * @return \phpsap\interfaces\IApi
     */
    public function addInput(IValue $value);

    /**
     * Get all input values of the remote function.
     * @return \phpsap\interfaces\Api\IValue[]
     */
    public function getInputValues();

    /**
     * Typecast the values of a given array to their according types of the input
     * values of the remote function.
     * @param array  $array
     * @return array
     */
    public function castInputValues($array);

    /**
     * Add an input value of the remote function.
     * @param \phpsap\interfaces\Api\IValue $value
     * @return \phpsap\interfaces\IApi
     */
    public function addOutput(IValue $value);

    /**
     * Get all output values of the remote function.
     * @return \phpsap\interfaces\Api\IValue[]
     */
    public function getOutputValues();

    /**
     * Typecast the values of a given array to their according types of the output
     * values of the remote function.
     * @param array  $array
     * @return array
     */
    public function castOutputValues($array);

    /**
     * Add a table of the remote function.
     * @param \phpsap\interfaces\Api\IArray $table
     * @return \phpsap\interfaces\IApi
     */
    public function addTable(IArray $table);

    /**
     * Get all tables of the remote function.
     * @return \phpsap\interfaces\Api\IArray[]
     */
    public function getTables();

    /**
     * Typecast the values of a given array to their according types of the table
     * values of the remote function.
     * @param array $array
     * @return array
     */
    public function castTables($array);

    /**
     * Unserialize a formerly JSON serialized IApi object.
     * @param string $json
     * @return \phpsap\interfaces\IApi
     */
    public static function unserializeJson($json);
}
