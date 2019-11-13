<?php

namespace phpsap\interfaces;

use phpsap\interfaces\Config\IConfiguration;
use phpsap\interfaces\IFunction;
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
     * @return IFunction
     * @throws IConnectionFailedException
     * @throws IUnknownFunctionException
     * @throws IIncompleteConfigException
     */
    public function prepareFunction($functionName);

    /**
     * Decode a JSON encoded connection configuration.
     * @param string|array|stdClass|IConfiguration $config Connection configuration
     * @return IConnection
     */
    public static function jsonDecode($config);
}
