<?php

namespace phpsap\interfaces\Util;

use JsonSerializable;

/**
 * Interface IJsonSerializable
 *
 * Extend PHP JsonSerializable interface by jsonDecode() method.
 *
 * @package phpsap\interfaces\Util
 * @author  Gregor J.
 * @license MIT
 */
interface IJsonSerializable extends JsonSerializable
{
    /**
     * Decode a formerly JSON encoded object.
     * @param string $json JSON encoded object.
     * @return \phpsap\interfaces\Util\IJsonSerializable
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public static function jsonDecode($json);
}
