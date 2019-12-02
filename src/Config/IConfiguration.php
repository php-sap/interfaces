<?php

namespace phpsap\interfaces\Config;

/**
 * Interface IConfiguration
 *
 * Defines the basic behavior of a configuration class.
 *
 * @package phpsap\interfaces\Config
 * @author  Gregor J.
 * @license MIT
 */
interface IConfiguration extends \JsonSerializable
{
    /**
     * Decode a JSON encoded configuration and return the correct configuration
     * class (A or B) depending on the values set in the configuration.
     * @param string $config JSON encoded configuration.
     * @return \phpsap\interfaces\Config\IConfigTypeA|\phpsap\interfaces\Config\IConfigTypeB
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public static function jsonDecode($config);
}
