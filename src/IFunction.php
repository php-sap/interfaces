<?php
/**
 * File src/IFunction.php
 *
 * PHP/SAP function interface.
 *
 * @package interfaces
 * @author  Gregor J.
 * @license MIT
 */

namespace phpsap\interfaces;

use phpsap\interfaces\Config\IConfiguration;

/**
 * Interface IFunction
 *
 * Manage a PHP/SAP remote function call.
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IFunction extends \JsonSerializable
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
     * @param string $name
     * @param array|string|float|int|bool|null $value
     * @return \phpsap\interfaces\IFunction
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
     * @throws \phpsap\interfaces\exceptions\IConnectionFailedException
     * @throws \phpsap\interfaces\exceptions\IFunctionCallException
     */
    public function invoke();

    /**
     * Decode a JSON encoded SAP remote function call
     * @param string|array|stdClass|IConfiguration $config Connection configuration.
     * @param string                               $function A JSON encoded SAP remote function call.
     * @return \phpsap\interfaces\IFunction
     */
    public static function jsonDecode($config, $function);
}
