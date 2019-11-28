<?php

namespace phpsap\interfaces\Config;

/**
 * Interface IConfiguration
 * @package phpsap\interfaces\Config
 * @author  Gregor J.
 * @license MIT
 */
interface IConfiguration extends \JsonSerializable
{
    /**
     * Get an associative array of all valid configuration keys (as keys of that
     * array) and whether they are mandatory (as values of that array).
     * @return array
     */
    public static function getValidConfigKeys();

    /**
     * Decode a JSON encoded configuration and return the correct configuration
     * class (A or B) depending on the values set in the configuration.
     * @param string $config JSON encoded configuration.
     * @return \phpsap\interfaces\Config\IConfigTypeA|\phpsap\interfaces\Config\IConfigTypeB
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public static function jsonDecode($config);
}
