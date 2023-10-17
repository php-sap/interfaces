<?php

declare(strict_types=1);

namespace phpsap\interfaces\Util;

use JsonSerializable;
use phpsap\interfaces\exceptions\IInvalidArgumentException;

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
     * @param  string  $json JSON encoded object.
     * @return IJsonSerializable
     * @throws IInvalidArgumentException
     */
    public static function jsonDecode(string $json): IJsonSerializable;
}
