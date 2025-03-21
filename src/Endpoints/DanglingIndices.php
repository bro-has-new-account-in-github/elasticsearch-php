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

declare(strict_types=1);

namespace Elastic\Ogi\Endpoints;

use Elastic\Ogi\Exception\ClientResponseException;
use Elastic\Ogi\Exception\MissingParameterException;
use Elastic\Ogi\Exception\ServerResponseException;
use Elastic\Ogi\Response\Elasticsearch;
use Elastic\Transport\Exception\NoNodeAvailableException;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
class DanglingIndices extends AbstractEndpoint
{
	/**
	 * Deletes the specified dangling index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-gateway-dangling-indices.html
	 *
	 * @param array{
	 *     index_uuid: string, // (REQUIRED) The UUID of the dangling index
	 *     accept_data_loss: boolean, // Must be set to true in order to delete the dangling index
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteDanglingIndex(array $params = [])
	{
		$this->checkRequiredParameters(['index_uuid'], $params);
		$url = '/_dangling/' . $this->encode($params['index_uuid']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['accept_data_loss','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Imports the specified dangling index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-gateway-dangling-indices.html
	 *
	 * @param array{
	 *     index_uuid: string, // (REQUIRED) The UUID of the dangling index
	 *     accept_data_loss: boolean, // Must be set to true in order to import the dangling index
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function importDanglingIndex(array $params = [])
	{
		$this->checkRequiredParameters(['index_uuid'], $params);
		$url = '/_dangling/' . $this->encode($params['index_uuid']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['accept_data_loss','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns all dangling indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-gateway-dangling-indices.html
	 *
	 * @param array{
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function listDanglingIndices(array $params = [])
	{
		$url = '/_dangling';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}
}
