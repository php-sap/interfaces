<?php

declare(strict_types=1);

namespace phpsap\interfaces\Config;

use phpsap\interfaces\exceptions\IIncompleteConfigException;
use phpsap\interfaces\exceptions\IInvalidArgumentException;

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
     * The host name of the message server.
     */
    public const JSON_MSHOST = 'mshost';

    /**
     * The name of SAP system, optional; default: destination
     */
    public const JSON_R3NAME = 'r3name';

    /**
     * The group name of the application servers.
     */
    public const JSON_GROUP = 'group';


    /**
     * Get the host name of the message server.
     * @return string
     * @throws IIncompleteConfigException
     */
    public function getMshost(): string;

    /**
     * Set the host name of the message server.
     * @param  string  $mshost The host name of the message server.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setMshost(string $mshost): IConfigTypeB;

    /**
     * Get the name of SAP system, optional; default: destination
     * @return string|null The name of the SAP system or NULL in case no name has been defined.
     */
    public function getR3name(): ?string;

    /**
     * Set the name of SAP system, optional; default: destination
     * @param  string  $r3name The name of the SAP system.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setR3name(string $r3name): IConfigTypeB;

    /**
     * Get the group name of the application servers, optional; default: PUBLIC.
     * @return string|null The name of the group  or NULL in case no group has been defined.
     */
    public function getGroup(): ?string;

    /**
     * Set the group name of the application servers, optional; default: PUBLIC.
     * @param  string  $group The group name of the application servers.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setGroup(string $group): IConfigTypeB;
}
