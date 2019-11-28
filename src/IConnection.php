<?php

namespace phpsap\interfaces;

use phpsap\interfaces\Config\IConfiguration;

/**
 * Interface IConnection
 *
 * Manage a SAP connection and its configuration.
 * This class can be JSON encoded using PHPs json_encode() and decoded, using the
 * static method jsonDecode() of this class.
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IConnection extends \JsonSerializable
{
    /**
     * Initialize the connection with its configuration.
     * @param \phpsap\interfaces\Config\IConfiguration $config Connection configuration.
     */
    public function __construct(IConfiguration $config);

    /**
     * Get the configuration of this connection instance.
     * @return \phpsap\interfaces\Config\IConfiguration
     */
    public function getConfiguration();

    /**
     * Prepare a remote function call and return a function instance.
     * @param string $functionName
     * @return \phpsap\interfaces\IFunction
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     * @throws \phpsap\interfaces\exceptions\IUnknownFunctionException
     * @throws \phpsap\interfaces\exceptions\IConnectionFailedException
     */
    public function prepareFunction($functionName);

    /**
     * Decode a JSON encoded remote function call and return a fully initialized
     * SAP remote function call ready to be invoked.
     * This can only be called from an instance of this class and not statically. In
     * order to call it statically, you'll need to use IFunction::jsonDecode().
     * @param string $function A JSON encoded SAP remote function call.
     * @return \phpsap\interfaces\IFunction
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function jsonDecodeFunction($function);

    /**
     * Decode a JSON encoded connection configuration.
     * @param string $config JSON encoded connection configuration.
     * @return \phpsap\interfaces\IConnection
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public static function jsonDecode($config);
}
