<?php

namespace phpsap\interfaces\Config;

/**
 * Interface IConfigTypeA
 *
 * Interface to configure connection parameters for SAP remote function calls using
 * a specific SAP application server (type A).
 *
 * @package phpsap\interfaces
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
     * @return string host name of a specific SAP application server
     * @throws \phpsap\interfaces\exceptions\IConfigKeyNotFoundException
     */
    public function getAshost();

    /**
     * Set the host name of a specific SAP application server.
     * @param string $ashost The host name of a specific SAP application server.
     * @return IConfigTypeA
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setAshost($ashost);

    /**
     * Get the SAP system number.
     * @return string SAP system number
     * @throws \phpsap\interfaces\exceptions\IConfigKeyNotFoundException
     */
    public function getSysnr();

    /**
     * Set the SAP system number.
     * @param string $sysnr The SAP system number.
     * @return \phpsap\interfaces\Config\IConfigTypeA
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setSysnr($sysnr);

    /**
     * optional; default: gateway on application server
     * @return string gateway on application server
     * @throws \phpsap\interfaces\exceptions\IConfigKeyNotFoundException
     */
    public function getGwhost();

    /**
     * optional; default: gateway on application server
     * @param string $gwhost The gateway on the application server.
     * @return \phpsap\interfaces\Config\IConfigTypeA
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setGwhost($gwhost);

    /**
     * optional; default: gateway on application server
     * @return string gateway on application server
     * @throws \phpsap\interfaces\exceptions\IConfigKeyNotFoundException
     */
    public function getGwserv();

    /**
     * optional; default: gateway on application server
     * @param string $gwserv The gateway on the application server.
     * @return \phpsap\interfaces\Config\IConfigTypeA
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setGwserv($gwserv);
}
