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
     * Get the host name of a specific SAP application server.
     * @return string
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     */
    public function getAshost();

    /**
     * Set the host name of a specific SAP application server.
     * @param string $ashost The host name of a specific SAP application server.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setAshost($ashost);

    /**
     * Get the SAP system number.
     * @return string
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
     * Optional gateway on application server; default: null
     * @return string|null
     */
    public function getGwhost();

    /**
     * Set the gateway on the application server.
     * @param string $gwhost The gateway on the application server.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setGwhost($gwhost);

    /**
     * Optional gateway on application server; default: null
     * @return string|null
     */
    public function getGwserv();

    /**
     * Set the gateway on the application server.
     * @param string $gwserv The gateway on the application server.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setGwserv($gwserv);
}
