<?php
/**
 * File src/IConfigA.php
 *
 * Type A configuration interface.
 *
 * @package interfaces
 * @author  Gregor J.
 * @license MIT
 */

namespace phpsap\interfaces;

/**
 * Interface IConfigA
 *
 * Interface to configure connection parameters for SAP remote function calls using
 * a specific SAP application server (type A).
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IConfigA extends IConfig
{
    /**
     * @var string A: RFC server is a specific SAP application server
     */
    const TYPE = 'A';

    /**
     * Get the host name of a specific SAP application server.
     * @return string host name of a specific SAP application server
     */
    public function getAshost();

    /**
     * Get the SAP system number.
     * @return string SAP system number
     */
    public function getSysnr();

    /**
     * optional; default: gateway on application server
     * @return string gateway on application server
     */
    public function getGwhost();

    /**
     * optional; default: gateway on application server
     * @return string gateway on application server
     */
    public function getGwserv();
}
