<?php
/**
 * File src/IConnection.php
 *
 * PHP/SAP connection interface.
 *
 * @package interfaces
 * @author  Gregor J.
 * @license MIT
 */

namespace phpsap\interfaces;

/**
 * Interface IConnection
 *
 * Manage a PHP/SAP connection instance.
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IConnection
{
    /**
     * Inject connection configuration.
     * @param \phpsap\interfaces\IConfig $config connection configuration
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     */
    public function __construct(IConfig $config);

    /**
     * Returns the connection ID.
     * The connection ID is derived from the configuration. The same configuration
     * will result in the same connection ID.
     * @return string
     */
    public function getId();

    /**
     * Is connection established?
     * @return bool
     */
    public function isConnected();

    /**
     * Establish a connection to the configured system.
     * In case the connection is already open, close it first.
     * @throws \phpsap\interfaces\exceptions\IConnectionFailedException
     */
    public function connect();

    /**
     * Send a ping request via an established connection to verify that the
     * connection works.
     * @return boolean success?
     * @throws \phpsap\interfaces\exceptions\IConnectionFailedException
     */
    public function ping();

    /**
     * Prepare a remote function call and return a function instance.
     * @param string $functionName
     * @return \phpsap\interfaces\IFunction
     * @throws \phpsap\interfaces\exceptions\IConnectionFailedException
     * @throws \phpsap\interfaces\exceptions\IUnknownFunctionException
     */
    public function prepareFunction($functionName);

    /**
     * Closes the connection.
     * @return void
     */
    public function close();
}
