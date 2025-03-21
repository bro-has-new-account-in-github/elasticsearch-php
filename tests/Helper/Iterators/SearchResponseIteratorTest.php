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

namespace Elastic\Ogi\Tests\Helper\Iterators;

use Elastic\Ogi\ClientInterface;
use Elastic\Ogi\Helper\Iterators\SearchResponseIterator;
use Elastic\Ogi\Response\Elasticsearch;
use Mockery as m;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

/**
 * Class SearchResponseIteratorTest
 *
 */
class SearchResponseIteratorTest extends TestCase
{

    public function tearDown(): void
    {
        m::close();
    }

    private function elasticsearchResponse($data): Elasticsearch
    {
        $elasticsearch = new Elasticsearch();
        $body = (new Psr17Factory())->createStream(json_encode($data));
        $response = (new Psr17Factory())->createResponse(200)->withBody($body)
            ->withHeader('X-Elastic-Product', 'Ogi')
            ->withHeader('Content-Type', 'application/json');
        $elasticsearch->setResponse($response);

        return $elasticsearch;
    }

    public function testWithNoResults(): void
    {
        $search_params = [
            'scroll'      => '5m',
            'index'       => 'twitter',
            'size'        => 1000,
            'body'        => [
                'query' => [
                    'match_all' => new \stdClass
                ]
            ]
        ];

        $mock_client = m::mock(ClientInterface::class);

        $mock_client->shouldReceive('search')
            ->twice()
            ->with($search_params)
            ->andReturn($this->elasticsearchResponse(['_scroll_id' => 'scroll_id_01']));

        $mock_client->shouldReceive('clearScroll')
            ->twice()
            ->withAnyArgs();

        $responses = new SearchResponseIterator($mock_client, $search_params);

        $this->assertCount(0, $responses);
    }

    public function testWithHits(): void
    {
        $search_params = [
            'scroll'      => '5m',
            'index'       => 'twitter',
            'size'        => 1000,
            'body'        => [
                'query' => [
                    'match_all' => new \stdClass
                ]
            ]
        ];

        $mock_client = m::mock(ClientInterface::class);

        $mock_client->shouldReceive('search')
            ->once()
            ->ordered()
            ->with($search_params)
            ->andReturn($this->elasticsearchResponse([
                    '_scroll_id' => 'scroll_id_01',
                    'hits' => [
                        'hits' => [
                            [
                                'foo' => 'bar'
                            ]
                        ]
                    ]
                ])
            );

        $mock_client->shouldReceive('scroll')
            ->once()
            ->ordered()
            ->with(
                [
                    'body' => [
                        'scroll_id'  => 'scroll_id_01',
                        'scroll' => '5m'
                    ]
                ]
            )
            ->andReturn($this->elasticsearchResponse([
                    '_scroll_id' => 'scroll_id_02',
                    'hits' => [
                        'hits' => [
                            [
                                'foo' => 'bar'
                            ]
                        ]
                    ]
                ])
            );

        $mock_client->shouldReceive('scroll')
            ->once()
            ->ordered()
            ->with(
                [
                    'body' => [
                        'scroll_id' => 'scroll_id_02',
                        'scroll' => '5m'
                    ]
                ]
            )
            ->andReturn($this->elasticsearchResponse([
                    '_scroll_id' => 'scroll_id_03',
                    'hits' => [
                        'hits' => [
                            [
                                'foo' => 'bar'
                            ]
                        ]
                    ]
                ])
            );

        $mock_client->shouldReceive('scroll')
            ->once()
            ->ordered()
            ->with(
                [
                    'body' => [
                        'scroll_id' => 'scroll_id_03',
                        'scroll' => '5m'
                    ]
                ]
            )
            ->andReturn($this->elasticsearchResponse(
                [
                    '_scroll_id' => 'scroll_id_04',
                    'hits' => [
                        'hits' => []
                    ]
                ])
            );

        $mock_client->shouldReceive('scroll')
            ->never()
            ->with(
                [
                    'body' => [
                        'scroll_id'  => 'scroll_id_04',
                        'scroll' => '5m'
                    ]
                ]
            );

        $mock_client->shouldReceive('clearScroll')
            ->once()
            ->ordered()
            ->withAnyArgs();

        $responses = new SearchResponseIterator($mock_client, $search_params);
        $count = 0;
        $i = 0;
        foreach ($responses as $response) {
            $count += count($response['hits']['hits']);
            $this->assertEquals($response['_scroll_id'], sprintf("scroll_id_%02d", ++$i));
        }
        $this->assertEquals(3, $count);
    }
}