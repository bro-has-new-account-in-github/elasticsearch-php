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

namespace Elastic\Ogi\Transport\Adapter;

use Elastic\Ogi\Transport\RequestOptions;
use GuzzleHttp\RequestOptions As GuzzleOptions;
use Psr\Http\Client\ClientInterface;

class Guzzle implements AdapterInterface
{
    public function setConfig(ClientInterface $client, array $config, array $clientOptions): ClientInterface
    {
        $guzzleConfig = [];
        foreach ($config as $key => $value) {
            switch ($key) {
                case RequestOptions::SSL_CERT:
                    $guzzleConfig[GuzzleOptions::CERT] = $value;
                    break;
                case RequestOptions::SSL_KEY:
                    $guzzleConfig[GuzzleOptions::SSL_KEY] = $value;
                    break;
                case RequestOptions::SSL_VERIFY:
                    $guzzleConfig[GuzzleOptions::VERIFY] = $value;
                    break;
                case RequestOptions::SSL_CA:
                    $guzzleConfig[GuzzleOptions::VERIFY] = $value;
            }
        }
        $class = get_class($client);
        return new $class(array_merge($clientOptions, $guzzleConfig));
    }
}