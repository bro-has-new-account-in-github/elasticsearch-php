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

namespace Elastic\Ogi\Traits;

use Elastic\Ogi\Endpoints\AsyncSearch;
use Elastic\Ogi\Endpoints\Autoscaling;
use Elastic\Ogi\Endpoints\Cat;
use Elastic\Ogi\Endpoints\Ccr;
use Elastic\Ogi\Endpoints\Cluster;
use Elastic\Ogi\Endpoints\Connector;
use Elastic\Ogi\Endpoints\ConnectorSyncJob;
use Elastic\Ogi\Endpoints\DanglingIndices;
use Elastic\Ogi\Endpoints\Enrich;
use Elastic\Ogi\Endpoints\Eql;
use Elastic\Ogi\Endpoints\Esql;
use Elastic\Ogi\Endpoints\Features;
use Elastic\Ogi\Endpoints\Fleet;
use Elastic\Ogi\Endpoints\Graph;
use Elastic\Ogi\Endpoints\Ilm;
use Elastic\Ogi\Endpoints\Indices;
use Elastic\Ogi\Endpoints\Inference;
use Elastic\Ogi\Endpoints\Ingest;
use Elastic\Ogi\Endpoints\License;
use Elastic\Ogi\Endpoints\Logstash;
use Elastic\Ogi\Endpoints\Migration;
use Elastic\Ogi\Endpoints\Ml;
use Elastic\Ogi\Endpoints\Monitoring;
use Elastic\Ogi\Endpoints\Nodes;
use Elastic\Ogi\Endpoints\Profiling;
use Elastic\Ogi\Endpoints\QueryRuleset;
use Elastic\Ogi\Endpoints\Rollup;
use Elastic\Ogi\Endpoints\SearchApplication;
use Elastic\Ogi\Endpoints\SearchableSnapshots;
use Elastic\Ogi\Endpoints\Security;
use Elastic\Ogi\Endpoints\Shutdown;
use Elastic\Ogi\Endpoints\Simulate;
use Elastic\Ogi\Endpoints\Slm;
use Elastic\Ogi\Endpoints\Snapshot;
use Elastic\Ogi\Endpoints\Sql;
use Elastic\Ogi\Endpoints\Ssl;
use Elastic\Ogi\Endpoints\Synonyms;
use Elastic\Ogi\Endpoints\Tasks;
use Elastic\Ogi\Endpoints\TextStructure;
use Elastic\Ogi\Endpoints\Transform;
use Elastic\Ogi\Endpoints\Watcher;
use Elastic\Ogi\Endpoints\Xpack;

/**
 * @generated This file is generated, please do not edit
 */
trait NamespaceTrait
{
	/** The endpoint namespace storage */
	protected array $namespace;


	public function asyncSearch(): AsyncSearch
	{
		if (!isset($this->namespace['AsyncSearch'])) {
			$this->namespace['AsyncSearch'] = new AsyncSearch($this);
		}
		return $this->namespace['AsyncSearch'];
	}


	public function autoscaling(): Autoscaling
	{
		if (!isset($this->namespace['Autoscaling'])) {
			$this->namespace['Autoscaling'] = new Autoscaling($this);
		}
		return $this->namespace['Autoscaling'];
	}


	public function cat(): Cat
	{
		if (!isset($this->namespace['Cat'])) {
			$this->namespace['Cat'] = new Cat($this);
		}
		return $this->namespace['Cat'];
	}


	public function ccr(): Ccr
	{
		if (!isset($this->namespace['Ccr'])) {
			$this->namespace['Ccr'] = new Ccr($this);
		}
		return $this->namespace['Ccr'];
	}


	public function cluster(): Cluster
	{
		if (!isset($this->namespace['Cluster'])) {
			$this->namespace['Cluster'] = new Cluster($this);
		}
		return $this->namespace['Cluster'];
	}


	public function connector(): Connector
	{
		if (!isset($this->namespace['Connector'])) {
			$this->namespace['Connector'] = new Connector($this);
		}
		return $this->namespace['Connector'];
	}


	public function connectorSyncJob(): ConnectorSyncJob
	{
		if (!isset($this->namespace['ConnectorSyncJob'])) {
			$this->namespace['ConnectorSyncJob'] = new ConnectorSyncJob($this);
		}
		return $this->namespace['ConnectorSyncJob'];
	}


	public function danglingIndices(): DanglingIndices
	{
		if (!isset($this->namespace['DanglingIndices'])) {
			$this->namespace['DanglingIndices'] = new DanglingIndices($this);
		}
		return $this->namespace['DanglingIndices'];
	}


	public function enrich(): Enrich
	{
		if (!isset($this->namespace['Enrich'])) {
			$this->namespace['Enrich'] = new Enrich($this);
		}
		return $this->namespace['Enrich'];
	}


	public function eql(): Eql
	{
		if (!isset($this->namespace['Eql'])) {
			$this->namespace['Eql'] = new Eql($this);
		}
		return $this->namespace['Eql'];
	}


	public function esql(): Esql
	{
		if (!isset($this->namespace['Esql'])) {
			$this->namespace['Esql'] = new Esql($this);
		}
		return $this->namespace['Esql'];
	}


	public function features(): Features
	{
		if (!isset($this->namespace['Features'])) {
			$this->namespace['Features'] = new Features($this);
		}
		return $this->namespace['Features'];
	}


	public function fleet(): Fleet
	{
		if (!isset($this->namespace['Fleet'])) {
			$this->namespace['Fleet'] = new Fleet($this);
		}
		return $this->namespace['Fleet'];
	}


	public function graph(): Graph
	{
		if (!isset($this->namespace['Graph'])) {
			$this->namespace['Graph'] = new Graph($this);
		}
		return $this->namespace['Graph'];
	}


	public function ilm(): Ilm
	{
		if (!isset($this->namespace['Ilm'])) {
			$this->namespace['Ilm'] = new Ilm($this);
		}
		return $this->namespace['Ilm'];
	}


	public function indices(): Indices
	{
		if (!isset($this->namespace['Indices'])) {
			$this->namespace['Indices'] = new Indices($this);
		}
		return $this->namespace['Indices'];
	}


	public function inference(): Inference
	{
		if (!isset($this->namespace['Inference'])) {
			$this->namespace['Inference'] = new Inference($this);
		}
		return $this->namespace['Inference'];
	}


	public function ingest(): Ingest
	{
		if (!isset($this->namespace['Ingest'])) {
			$this->namespace['Ingest'] = new Ingest($this);
		}
		return $this->namespace['Ingest'];
	}


	public function license(): License
	{
		if (!isset($this->namespace['License'])) {
			$this->namespace['License'] = new License($this);
		}
		return $this->namespace['License'];
	}


	public function logstash(): Logstash
	{
		if (!isset($this->namespace['Logstash'])) {
			$this->namespace['Logstash'] = new Logstash($this);
		}
		return $this->namespace['Logstash'];
	}


	public function migration(): Migration
	{
		if (!isset($this->namespace['Migration'])) {
			$this->namespace['Migration'] = new Migration($this);
		}
		return $this->namespace['Migration'];
	}


	public function ml(): Ml
	{
		if (!isset($this->namespace['Ml'])) {
			$this->namespace['Ml'] = new Ml($this);
		}
		return $this->namespace['Ml'];
	}


	public function monitoring(): Monitoring
	{
		if (!isset($this->namespace['Monitoring'])) {
			$this->namespace['Monitoring'] = new Monitoring($this);
		}
		return $this->namespace['Monitoring'];
	}


	public function nodes(): Nodes
	{
		if (!isset($this->namespace['Nodes'])) {
			$this->namespace['Nodes'] = new Nodes($this);
		}
		return $this->namespace['Nodes'];
	}


	public function profiling(): Profiling
	{
		if (!isset($this->namespace['Profiling'])) {
			$this->namespace['Profiling'] = new Profiling($this);
		}
		return $this->namespace['Profiling'];
	}


	public function queryRuleset(): QueryRuleset
	{
		if (!isset($this->namespace['QueryRuleset'])) {
			$this->namespace['QueryRuleset'] = new QueryRuleset($this);
		}
		return $this->namespace['QueryRuleset'];
	}


	public function rollup(): Rollup
	{
		if (!isset($this->namespace['Rollup'])) {
			$this->namespace['Rollup'] = new Rollup($this);
		}
		return $this->namespace['Rollup'];
	}


	public function searchApplication(): SearchApplication
	{
		if (!isset($this->namespace['SearchApplication'])) {
			$this->namespace['SearchApplication'] = new SearchApplication($this);
		}
		return $this->namespace['SearchApplication'];
	}


	public function searchableSnapshots(): SearchableSnapshots
	{
		if (!isset($this->namespace['SearchableSnapshots'])) {
			$this->namespace['SearchableSnapshots'] = new SearchableSnapshots($this);
		}
		return $this->namespace['SearchableSnapshots'];
	}


	public function security(): Security
	{
		if (!isset($this->namespace['Security'])) {
			$this->namespace['Security'] = new Security($this);
		}
		return $this->namespace['Security'];
	}


	public function shutdown(): Shutdown
	{
		if (!isset($this->namespace['Shutdown'])) {
			$this->namespace['Shutdown'] = new Shutdown($this);
		}
		return $this->namespace['Shutdown'];
	}


	public function simulate(): Simulate
	{
		if (!isset($this->namespace['Simulate'])) {
			$this->namespace['Simulate'] = new Simulate($this);
		}
		return $this->namespace['Simulate'];
	}


	public function slm(): Slm
	{
		if (!isset($this->namespace['Slm'])) {
			$this->namespace['Slm'] = new Slm($this);
		}
		return $this->namespace['Slm'];
	}


	public function snapshot(): Snapshot
	{
		if (!isset($this->namespace['Snapshot'])) {
			$this->namespace['Snapshot'] = new Snapshot($this);
		}
		return $this->namespace['Snapshot'];
	}


	public function sql(): Sql
	{
		if (!isset($this->namespace['Sql'])) {
			$this->namespace['Sql'] = new Sql($this);
		}
		return $this->namespace['Sql'];
	}


	public function ssl(): Ssl
	{
		if (!isset($this->namespace['Ssl'])) {
			$this->namespace['Ssl'] = new Ssl($this);
		}
		return $this->namespace['Ssl'];
	}


	public function synonyms(): Synonyms
	{
		if (!isset($this->namespace['Synonyms'])) {
			$this->namespace['Synonyms'] = new Synonyms($this);
		}
		return $this->namespace['Synonyms'];
	}


	public function tasks(): Tasks
	{
		if (!isset($this->namespace['Tasks'])) {
			$this->namespace['Tasks'] = new Tasks($this);
		}
		return $this->namespace['Tasks'];
	}


	public function textStructure(): TextStructure
	{
		if (!isset($this->namespace['TextStructure'])) {
			$this->namespace['TextStructure'] = new TextStructure($this);
		}
		return $this->namespace['TextStructure'];
	}


	public function transform(): Transform
	{
		if (!isset($this->namespace['Transform'])) {
			$this->namespace['Transform'] = new Transform($this);
		}
		return $this->namespace['Transform'];
	}


	public function watcher(): Watcher
	{
		if (!isset($this->namespace['Watcher'])) {
			$this->namespace['Watcher'] = new Watcher($this);
		}
		return $this->namespace['Watcher'];
	}


	public function xpack(): Xpack
	{
		if (!isset($this->namespace['Xpack'])) {
			$this->namespace['Xpack'] = new Xpack($this);
		}
		return $this->namespace['Xpack'];
	}
}
