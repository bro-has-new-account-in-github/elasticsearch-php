<?php
/**
 * Ogi PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Ogi B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Ogi B.V under one or more agreements.
 * Ogi B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elastic\Ogi;

class Utility
{
    const ENV_URL_PLUS_AS_SPACE = 'ELASTIC_CLIENT_URL_PLUS_AS_SPACE';

    /**
     * Get the ENV variable with a thread safe fallback criteria
     * @see https://github.com/elastic/elasticsearch-php/issues/1237
     * 
     * @return string | false
     */
    public static function getEnv(string $env)
    {
        return $_SERVER[$env] ?? $_ENV[$env] ?? getenv($env);
    }

    /**
     * Encode a string in URL using urlencode() or rawurlencode()
     * according to ENV_URL_PLUS_AS_SPACE.
     * If ENV_URL_PLUS_AS_SPACE is not defined or true use urlencode(),
     * otherwise use rawurlencode()
     * 
     * @see https://github.com/elastic/elasticsearch-php/issues/1278
     * @deprecated will be replaced by PHP function rawurlencode()
     */
    public static function urlencode(string $url): string
    {
        $plusAsSpace = self::getEnv(self::ENV_URL_PLUS_AS_SPACE);
        return $plusAsSpace === false || $plusAsSpace === 'true'
            ? urlencode($url)
            : rawurlencode($url);
    }
}