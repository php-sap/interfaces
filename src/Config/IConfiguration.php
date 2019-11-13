<?php

namespace phpsap\interfaces\Config;

use stdClass;
use LogicException;
use InvalidArgumentException;
use phpsap\interfaces\exceptions\IConfigKeyNotFoundException;
use phpsap\interfaces\Config\IConfigTypeA;
use phpsap\interfaces\Config\IConfigTypeB;

/**
 * Interface IConfiguration
 * @package phpsap\interfaces\Config
 * @author  Gregor J.
 * @license MIT
 */
interface IConfiguration extends \JsonSerializable
{
    /**
     * Get an array of all valid configuration keys and whether they are mandatory.
     * @return array
     */
    public static function getValidConfigKeys();

    /**
     * Decode a JSON encoded configuration and return the correct configuration
     * class (A or B) depending on the values set in the configuration.
     * @param string|array|stdClass The JSON encoded configuration (string), or the
     *                              already decoded JSON (array or stdClass).
     * @return IConfigTypeA|IConfigTypeB
     */
    public static function jsonDecode($config);
}
