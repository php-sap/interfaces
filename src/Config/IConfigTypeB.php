<?php

namespace phpsap\interfaces\Config;

/**
 * Interface IConfigTypeB
 *
 * Interface to configure connection parameters for SAP remote function calls using
 * load balancing (type B).
 *
 * @package phpsap\interfaces\Config
 * @author  Gregor J.
 * @license MIT
 */
interface IConfigTypeB extends IConfigCommon
{
    /**
     * The name of SAP system, optional; default: destination
     */
    const JSON_R3NAME = 'r3name';

    /**
     * The host name of the message server.
     */
    const JSON_MSHOST = 'mshost';

    /**
     * The group name of the application servers.
     */
    const JSON_GROUP = 'group';


    /**
     * Get the host name of the message server.
     * @return string
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     */
    public function getMshost();

    /**
     * Set the host name of the message server.
     * @param string $mshost The host name of the message server.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setMshost($mshost);

    /**
     * Get the name of SAP system, optional; default: destination
     * @return string|null
     */
    public function getR3name();

    /**
     * Set the name of SAP system, optional; default: destination
     * @param string $r3name The name of the SAP system.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setR3name($r3name);

    /**
     * Get the group name of the application servers, optional; default: PUBLIC.
     * @return string|null
     */
    public function getGroup();

    /**
     * Set the group name of the application servers, optional; default: PUBLIC.
     * @param string $group The group name of the application servers.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setGroup($group);
}
