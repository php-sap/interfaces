<?php

namespace phpsap\interfaces;

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
     * Add a value, struct or table of the remote function.
     * @param \phpsap\interfaces\Api\IValue $value
     * @return \phpsap\interfaces\IApi
     */
    public function add(IValue $value);

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
     * Decode a formerly JSON encoded IApi object.
     * @param string|\stdClass|array $json
     * @return \phpsap\interfaces\IApi
     */
    public static function jsonDecode($json);
}
