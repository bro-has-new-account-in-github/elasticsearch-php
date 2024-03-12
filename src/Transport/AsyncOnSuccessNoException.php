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

namespace Elastic\Ogi\Transport;

use Elastic\Ogi\Response\Elasticsearch;
use Elastic\Transport\Async\OnSuccessInterface;
use Psr\Http\Message\ResponseInterface;

class AsyncOnSuccessNoException implements OnSuccessInterface
{
    public function success(ResponseInterface $response, int $count): Elasticsearch
    {
        $result = new Elasticsearch;
        $result->setResponse($response, false);
        return $result;
    }
}