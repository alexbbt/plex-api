<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Service;


use Symfony\Component\HttpClient\HttpClient;

class Connector
{
	private $connection;

	public function __construct(
		private string $host,
		private string $token,
		private int $port = 32400
	)
	{
		$this->connection = HttpClient::create([
			'query' => ['X-Plex-Token' => $this->token],
			'max_redirects' => 5,
			'timeout' => 10,
			'verify_host' => false,
			'base_uri' => $this->host . ':' . $this->port,
		]);
	}

	public function get(string $endpoint)
	{
		return simplexml_load_string($this->connection->request('GET', $endpoint)->getContent());
	}
}
