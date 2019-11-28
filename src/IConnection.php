<?php

namespace phpsap\interfaces;

use stdClass;
use phpsap\interfaces\Config\IConfiguration;
use phpsap\interfaces\exceptions\IConnectionFailedException;
use phpsap\interfaces\exceptions\IUnknownFunctionException;
use phpsap\interfaces\exceptions\IIncompleteConfigException;

/**
 * Interface IConnection
 *
 * Manage a PHP/SAP connection instance.
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IConnection extends \JsonSerializable
{
    /**
     * Inject connection configuration.
     * @param string|array|stdClass|IConfiguration $config Connection configuration
     */
    public function __construct($config);

    /**
     * Get the configuration of this connection instance.
     * @return IConfiguration
     */
    public function getConfiguration();

    /**
     * Prepare a remote function call and return a function instance.
     * @param string $functionName
     * @return \phpsap\interfaces\IFunction
     * @throws IConnectionFailedException
     * @throws IUnknownFunctionException
     * @throws IIncompleteConfigException
     */
    public function prepareFunction($functionName);

    /**
     * Decode a JSON encoded remote function call.
     * @param string $function A JSON encoded SAP remote function call.
     * @return \phpsap\interfaces\IFunction
     */
    public function jsonDecodeFunction($function);

    /**
     * Decode a JSON encoded connection configuration.
     * @param string|array|stdClass|IConfiguration $config Connection configuration
     * @return \phpsap\interfaces\IConnection
     */
    public static function jsonDecode($config);
}
