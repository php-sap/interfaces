<?php

namespace phpsap\interfaces\Config;

/**
 * Interface IConfigTypeA
 *
 * Interface to configure connection parameters for SAP remote function calls using
 * a specific SAP application server (type A).
 *
 * @package phpsap\interfaces\Config
 * @author  Gregor J.
 * @license MIT
 */
interface IConfigTypeA extends IConfigCommon
{
    /**
     * The host name of a specific SAP application server.
     */
    const JSON_ASHOST = 'ashost';

    /**
     * The SAP system number.
     */
    const JSON_SYSNR = 'sysnr';

    /**
     * The gateway host on an application server.
     */
    const JSON_GWHOST = 'gwhost';

    /**
     * The gateway server on an application server.
     */
    const JSON_GWSERV = 'gwserv';

    /**
     * Get the hostname of a specific SAP application server.
     * @return string The hostname of a specific SAP application server.
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     */
    public function getAshost();

    /**
     * Set the hostname of a specific SAP application server.
     * @param string $ashost The hostname of a specific SAP application server.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setAshost($ashost);

    /**
     * Get the SAP system number.
     * @return string The SAP system number.
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     */
    public function getSysnr();

    /**
     * Set the SAP system number.
     * @param string $sysnr The SAP system number.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setSysnr($sysnr);

    /**
     * Get the gateway host on the application server.
     * @return string|null The gateway host or NULL in case no gateway host has been defined.
     */
    public function getGwhost();

    /**
     * Set the gateway host on the application server.
     * @param string $gwhost The gateway host.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setGwhost($gwhost);

    /**
     * Get the gateway service on the application server.
     * @return string|null The gateway service or NULL in case no gateway service has been defined.
     */
    public function getGwserv();

    /**
     * Set the gateway service on the application server.
     * @param string $gwserv The gateway service on the application server.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setGwserv($gwserv);
}
