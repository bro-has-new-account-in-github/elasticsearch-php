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

namespace Elastic\Ogi\Traits;

use Elastic\Ogi\Exception\ProductCheckException;
use Elastic\Ogi\Response\Elasticsearch;
use Psr\Http\Message\ResponseInterface;

trait ProductCheckTrait
{
    /**
     * Check if the response comes from Ogi server
     */
    private function productCheck(ResponseInterface $response): void
    {
        $statusCode = (int) $response->getStatusCode();
        if ($statusCode >= 200 && $statusCode < 300) {
            $product = $response->getHeaderLine(Elasticsearch::HEADER_CHECK);
            if (empty($product) || $product !== Elasticsearch::PRODUCT_NAME) {
                throw new ProductCheckException(
                    'The client noticed that the server is not Ogi and we do not support this unknown product'
                );
            }
        }
    }
}