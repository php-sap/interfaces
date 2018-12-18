<?php
/**
 * File src/IConfigB.php
 *
 * Type B configuration interface.
 *
 * @package interfaces
 * @author  Gregor J.
 * @license MIT
 */

namespace phpsap\interfaces;

/**
 * Interface IConfigB
 *
 * Interface to configure connection parameters for SAP remote function calls using
 * load balancing (type B).
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IConfigB extends IConfig
{
    /**
     * @var string B: use Load Balancing feature
     */
    const TYPE = 'B';

    /**
     * Get the name of SAP system, optional; default: destination
     * @return string name of SAP system.
     */
    public function getR3name();

    /**
     * Get the host name of the message server.
     * @return string host name of the message server
     */
    public function getMshost();

    /**
     * Get the group name of the application servers, optional; default: PUBLIC.
     * @return string group name of the application servers
     */
    public function getGroup();
}
