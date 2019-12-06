<?php

namespace phpsap\interfaces;

use phpsap\interfaces\Api\IApi;
use phpsap\interfaces\Config\IConfiguration;
use phpsap\interfaces\Util\IJsonSerializable;

/**
 * Interface IFunction
 *
 * Manage a SAP remote function call.
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
    const JSON_NAME = 'name';

    /**
     * JSON configuration key for the SAP remote function API.
     */
    const JSON_API = 'api';

    /**
     * JSON configuration key for the SAP remote function call parameters.
     */
    const JSON_PARAM = 'params';

    /**
     * Initialize the remote function call with at least a name.
     * In order to add SAP remote function call parameters, an API needs to be
     * defined. In case no SAP remote function call API has been defined, it will be
     * queried on the fly by connecting to the SAP remote system. In order to
     * connect to the SAP remote system, you need a connection configuration.
     * @param string                                        $name   SAP remote function name.
     * @param array|null                                    $params SAP remote function call parameters. Default: null
     * @param \phpsap\interfaces\Config\IConfiguration|null $config Connection configuration. Default: null
     * @param \phpsap\interfaces\Api\IApi|null              $api    SAP remote function call API. Default: null
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function __construct($name, array $params = null, IConfiguration $config = null, IApi $api = null);

    /**
     * Get the SAP remote function name.
     * @return string
     */
    public function getName();

    /**
     * Get the SAP connection configuration for this remote function.
     * @return \phpsap\interfaces\Config\IConfiguration|null
     */
    public function getConfiguration();

    /**
     * Set the SAP connection configuration for this remote function.
     * Using this configuration, the SAP remote function API can be queried and
     * SAP remote function calls can be invoked.
     * @param \phpsap\interfaces\Config\IConfiguration $config
     * @return $this
     */
    public function setConfiguration(IConfiguration $config);

    /**
     * Connect to the SAP remote system and extract the API of the SAP remote
     * function. This ignores any API settings in this class.
     * @return \phpsap\interfaces\Api\IApi
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     */
    public function extractApi();

    /**
     * Get the remote function API.
     * In case no SAP remote function call API has been defined, it will be queried
     * on the fly by connecting to the SAP remote system.
     * @return \phpsap\interfaces\Api\IApi
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     */
    public function getApi();

    /**
     * Set the SAP remote function API (e.g. from cache).
     * By setting the API, it will not be queried from the SAP remote system.
     * In order to connect to the SAP remote system, you need a connection
     * configuration- see setConfiguration().
     * @param \phpsap\interfaces\Api\IApi $api
     * @return $this
     */
    public function setApi(IApi $api);

    /**
     * Returns all previously set parameters.
     * @return array Associative array of all parameters that have been set.
     */
    public function getParams();

    /**
     * Set function call parameter.
     * @param string                           $name  The name of the parameter.
     * @param array|string|float|int|bool|null $value The parameter value.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setParam($name, $value);

    /**
     * Set function call parameter.
     * @param array $params The SAP remote function call parameters.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setParams(array $params);

    /**
     * Remove all parameters that have been set and start over.
     * @return $this
     */
    public function reset();

    /**
     * Invoke the SAP remote function call with all parameters.
     * Attention: A configuration is necessary to invoke a SAP remote function call!
     * @return array
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException Either a configuration class has not been set,
     *                                                                  or it is missing a mandatory configuration key.
     * @throws \phpsap\interfaces\exceptions\IConnectionFailedException
     * @throws \phpsap\interfaces\exceptions\IUnknownFunctionException
     * @throws \phpsap\interfaces\exceptions\IFunctionCallException
     */
    public function invoke();
}
