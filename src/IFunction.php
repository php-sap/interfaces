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

/**
 * Interface IFunction
 *
 * Manage a PHP/SAP remote function call.
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IFunction
{
    /**
     * Get the function name.
     * @return string
     */
    public function getName();

    /**
     * Get an associative array, that describes the API of the remote function.
     * The associative array consists of arrays for 'input', 'output',
     * 'bidirectional' and 'table' parameters.
     * @return array
     */
    public function getApi();

    /**
     * Load an associative array that describes the API of the remote function.
     * This can be used to cache the remote API description.
     * @param array $api
     * @return \phpsap\interfaces\IFunction
     */
    public function setApi($api);

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
     * Get all set parameters.
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
}
