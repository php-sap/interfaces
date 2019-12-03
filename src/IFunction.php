<?php

namespace phpsap\interfaces;

use JsonSerializable;
use phpsap\interfaces\Config\IConfiguration;

/**
 * Interface IFunction
 *
 * Manage a SAP remote function call.
 * This class can be JSON encoded using PHPs json_encode() and decoded, using the
 * static method jsonDecode() of this class.
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IFunction extends JsonSerializable
{
    /**
     * Get the function name.
     * @return string
     */
    public function getName();

    /**
     * Retrieve the remote function API.
     * @return \phpsap\interfaces\IApi
     */
    public function getApi();

    /**
     * Manually set the remote function API (e.g. from cache).
     * @param \phpsap\interfaces\IApi $api
     * @return \phpsap\interfaces\IFunction
     */
    public function setApi(IApi $api);

    /**
     * Remove all parameters that have been set and start over.
     * @return \phpsap\interfaces\IFunction
     */
    public function reset();

    /**
     * Set function call parameter.
     * @param string                           $name  The name of the parameter.
     * @param array|string|float|int|bool|null $value The parameter value.
     * @return \phpsap\interfaces\IFunction
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setParam($name, $value);

    /**
     * Returns all previously set parameters.
     * @return array Associative array of all parameters that have been set.
     */
    public function getParams();

    /**
     * Invoke the prepared function call.
     * @return array
     * @throws \phpsap\interfaces\exceptions\IFunctionCallException
     */
    public function invoke();

    /**
     * Decode a JSON encoded SAP remote function call.
     * A formerly encoded SAP remote function call can only be decoded using a
     * connection configuration. In case you already have a connection instance, use
     * the jsonDecodeFunction() method of that instance.
     * @param \phpsap\interfaces\Config\IConfiguration $config   Connection configuration.
     * @param string                                   $function JSON encoded SAP remote function call.
     * @return \phpsap\interfaces\IFunction
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public static function jsonDecode(IConfiguration $config, $function);
}
