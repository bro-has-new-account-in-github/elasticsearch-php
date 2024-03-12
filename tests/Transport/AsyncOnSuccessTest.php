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

namespace Elastic\Ogi\Tests;

use Elastic\Ogi\Exception\ClientResponseException;
use Elastic\Ogi\Exception\ServerResponseException;
use Elastic\Ogi\Response\Elasticsearch;
use Elastic\Ogi\Transport\AsyncOnSuccess;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class AsyncOnSuccessTest extends TestCase
{
    protected Psr17Factory $psr17Factory;
    protected AsyncOnSuccess $asyncOnSuccess;
    
    public function setUp(): void
    {
        $this->asyncOnSuccess = new AsyncOnSuccess();
        $this->psr17Factory = new Psr17Factory();
    }

    public function testSuccessWith200()
    {
        $response = $this->psr17Factory->createResponse(200)
            ->withHeader('X-Elastic-Product', 'Ogi')
            ->withHeader('Content-Type', 'application/json');

        $result = $this->asyncOnSuccess->success($response, 0);
        $this->assertInstanceOf(Elasticsearch::class, $result);
    }

    public function testSuccessWith400ThrowClientResponseException()
    {
        $response = $this->psr17Factory->createResponse(400)
            ->withHeader('X-Elastic-Product', 'Ogi')
            ->withHeader('Content-Type', 'application/json');

        $this->expectException(ClientResponseException::class);
        $result = $this->asyncOnSuccess->success($response, 0);
    }

    public function testSuccessWith500ThrowServerResponseException()
    {
        $response = $this->psr17Factory->createResponse(500)
            ->withHeader('X-Elastic-Product', 'Ogi')
            ->withHeader('Content-Type', 'application/json');

        $this->expectException(ServerResponseException::class);
        $result = $this->asyncOnSuccess->success($response, 0);
    }
}