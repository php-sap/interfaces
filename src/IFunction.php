<?php

declare(strict_types=1);

namespace phpsap\interfaces;

use phpsap\interfaces\Api\IApi;
use phpsap\interfaces\Config\IConfiguration;
use phpsap\interfaces\exceptions\IConnectionFailedException;
use phpsap\interfaces\exceptions\IFunctionCallException;
use phpsap\interfaces\exceptions\IIncompleteConfigException;
use phpsap\interfaces\exceptions\IInvalidArgumentException;
use phpsap\interfaces\exceptions\IUnknownFunctionException;
use phpsap\interfaces\Util\IJsonSerializable;

/**
 * Interface IFunction
 *
 * Prepare and invoke a SAP remote function call.
 *
 * As with all classes of this package, this class can be serialized using
 * json_encode() and unserialized using the static method IFunction::jsonDecode().
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IFunction extends IJsonSerializable
{
    /**
     * JSON configuration key for the SAP remote function name.
     */
    public const JSON_NAME = 'name';

    /**
     * JSON configuration key for the SAP remote function API.
     */
    public const JSON_API = 'api';

    /**
     * JSON configuration key for the SAP remote function call parameters.
     */
    public const JSON_PARAM = 'params';

    /**
     * Create a remote function call with at least a name.
     *
     * In order to add SAP remote function call parameters, an API needs to be
     * present. In case no SAP remote function call API has been defined, it will be
     * queried on the fly by connecting to the SAP remote system. In order to
     * connect to the SAP remote system, a SAP connection configuration needs to be
     * present.
     *
     * @param  string  $name  SAP remote function name.
     * @param  array<string, mixed>|null  $params  SAP remote function call parameters. Default: null
     * @param  IConfiguration|null  $config  SAP connection configuration. Default: null
     * @param  IApi|null  $api  SAP remote function call API. Default: null
     * @throws IInvalidArgumentException
     * @throws IIncompleteConfigException
     * @throws IConnectionFailedException
     * @throws IUnknownFunctionException
     */
    public static function create(string $name, array $params = null, IConfiguration $config = null, IApi $api = null): IFunction;

    /**
     * Get the SAP remote function name.
     * @return string
     */
    public function getName(): string;

    /**
     * Get the SAP connection configuration for this remote function.
     *
     * In case no configuration has been set, null will be returned.
     *
     * @return IConfiguration|null
     */
    public function getConfiguration(): ?IConfiguration;

    /**
     * Set the SAP connection configuration for this remote function.
     *
     * Using this configuration, the SAP remote function API can be queried and
     * SAP remote function calls can be invoked.
     *
     * @param  IConfiguration  $config
     * @return $this
     */
    public function setConfiguration(IConfiguration $config): IFunction;

    /**
     * Connect to the SAP remote system and extract the API of the SAP remote
     * function.
     *
     * In order to query the SAP remote system and extract the API of the SAP remote
     * function, a connection configuration needs to be present. Use
     * setConfiguration() to set the connection configuration.
     *
     * This method ignores the cached API of this class and doesn't overwrite it.
     * Every time this method is called, it will query the SAP remote system and
     * extract the API of the SAP remote function.
     *
     * @return IApi
     * @throws IIncompleteConfigException
     * @throws IConnectionFailedException
     * @throws IUnknownFunctionException
     */
    public function extractApi(): IApi;

    /**
     * Get the remote function API.
     *
     * In case no SAP remote function call API has been defined using setApi(), it
     * will be queried on the fly using extractApi() the first time this method is
     * called.
     *
     * In case extractApi() has to be called, a connection configuration needs to be
     * present. Use setConfiguration() to set the connection configuration.
     *
     * @return IApi
     * @throws IIncompleteConfigException
     * @throws IConnectionFailedException
     * @throws IUnknownFunctionException
     */
    public function getApi(): IApi;

    /**
     * Set the SAP remote function API (e.g. from cache).
     *
     * By setting the API, it will not be queried from the SAP remote system when
     * calling getApi(). Instead, getApi() will return whatever has been set using
     * this method.
     *
     * @param  IApi  $api
     * @return $this
     */
    public function setApi(IApi $api): IFunction;

    /**
     * Returns all previously set parameters.
     *
     * @return array<string, mixed> Associative array of all parameters that have been set.
     */
    public function getParams(): array;

    /**
     * Extract all expected SAP remote function call parameters from the given array
     * and merge them with the existing ones.
     *
     * The expected SAP remote function call parameters are queried using getApi(),
     * therefore either a remote API needs to be set using setApi(), or a SAP
     * connection configuration for this remote function needs to be set using
     * setConfiguration().
     *
     * @param array<string, mixed> $params An array of SAP remote function call parameters.
     * @return $this
     * @throws IIncompleteConfigException
     * @throws IConnectionFailedException
     * @throws IUnknownFunctionException
     */
    public function setParams(array $params): IFunction;

    /**
     * Remove all SAP remote function call parameters that have been set before
     * and start over.
     *
     * @return $this
     */
    public function resetParams(): IFunction;

    /**
     * Invoke the SAP remote function call.
     *
     * A SAP connection configuration needs to be present for a remote function
     * call. Use setConfiguration() to set the connection configuration.
     *
     * @return array<string, mixed>
     * @throws IIncompleteConfigException
     * @throws IConnectionFailedException
     * @throws IUnknownFunctionException
     * @throws IFunctionCallException
     */
    public function invoke(): array;
}
