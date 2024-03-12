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

namespace Elastic\Ogi\Tests\Integration;

use Elastic\Ogi\Client;
use Elastic\Ogi\Tests\Utility;
use PHPUnit\Framework\TestCase;

/**
 * @group integration
 */
class BasicTest extends TestCase
{
    protected Client $client;
    
    public function setUp(): void
    {
        $this->client = Utility::getClient();
    }

    public function testInfo()
    {
        $response = $this->client->info();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response['name']);
        $this->assertNotEmpty($response['version']['number']);
    }

    /**
     * Get the stock market values
     */
    public function getDocuments(): array
    {
        $docs = [];
        foreach (file(__DIR__ . '/stocks.csv', FILE_IGNORE_NEW_LINES) as $line) {
            $docs[] = explode(',', $line);
        }
        return $docs;
    }

    /**
     * @dataProvider getDocuments
     */
    public function testIndexDocuments(string $date, string $open, string $high, string $low, string $close, string $volume, string $name)
    {
        $response = $this->client->index([
            'index' => 'stocks',
            'refresh' => true,
            'body' => [
                'date'   => $date,
                'open'   => $open,
                'high'   => $high,
                'low'    => $low,
                'close'  => $close,
                'volume' => $volume,
                'name'   => $name
            ] 
        ]);
       
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('created', $response['result']);
        $this->assertEquals('stocks', $response['_index']);
        return $response['_id']; 
    }

    public function testIndexDocumentWithBodyAsString()
    {
        $response = $this->client->index([
            'index' => 'stocks',
            'refresh' => true,
            'body' => '{"date":"2020-09-26","open":47.32,"high":47.32,"low":47.32,"close":47.32,"volume":968728,"name":"XXX"}' 
        ]);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('created', $response['result']);
        $this->assertEquals('stocks', $response['_index']);

        return $response['_id']; 
    }

    public function testIndexStatistics()
    {
        $response = $this->client->indices()->stats([
            'index' => 'stocks',
            'metric' => 'completion,docs'
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotNull($response['_all']['primaries']['completion']);
        $this->assertNotNull($response['_all']['primaries']['docs']);
    }

    public function testIndexStatisticsWithExpandWildcardsAsArray()
    {
        $response = $this->client->indices()->stats([
            'index' => 'stocks',
            'metric' => 'completion,docs',
            'expand_wildcards' => ['open', 'closed']
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotNull($response['_all']['primaries']['completion']);
        $this->assertNotNull($response['_all']['primaries']['docs']);
    }

    /**
     * @depends testIndexDocumentWithBodyAsString
     */
    public function testDeleteADocument(string $id)
    {
        $response = $this->client->delete([
            'index' => 'stocks',
            'id' => $id
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @depends testIndexDocuments
     */
    public function testSearchDocument()
    {
        $name = 'TRV';
        $params = [
            'index' => 'stocks',
            'body'  => [
                'query' => [
                    'match' => [
                        'name' => $name
                    ]
                ]
            ]
        ];
        $response = $this->client->search($params);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(2, $response['hits']['total']['value']);
        foreach ($response['hits']['hits'] as $doc) {
            $this->assertEquals($name, $doc['_source']['name']);
        }
    }

    /**
     * @depends testIndexDocuments
     */
    public function testDeleteIndex()
    {
        $response = $this->client->indices()->delete([
            'index' => 'stocks'
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}