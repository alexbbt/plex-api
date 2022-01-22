<?php
declare(strict_types=1);

namespace Chindit\PlexApi;

use Chindit\PlexApi\Model\Server;
use Chindit\PlexApi\Model\Session;
use Chindit\PlexApi\Service\Connector;

class PlexServer
{
	private Connector $connector;

	public function __construct(
		string $host,
		string $key,
		int $port = 32400
	)
	{
		$this->connector = new Connector($host, $key, $port);
	}

	/**
	 * @return array<Server>
	 */
	public function servers(): array
	{
		$serverResponse = $this->connector->get('/servers');

		$servers = [];

		foreach ($serverResponse->Server as $server) {
			$servers[] = new Server(
				(string)$server->attributes()['name'],
				(string)$server->attributes()['host'],
				(string)$server->attributes()['address'],
				(int)$server->attributes()['port'],
				(string)$server->attributes()['machineIdentifier'],
				(string)$server->attributes()['version']
			);
		}
		return $servers;
	}

	/**
	 * @return array<Session>
	 */
	public function sessions(): array
	{
		$serverResponse = $this->connector->get('/status/sessions');

		$sessions = [];

		foreach ($serverResponse as $session) {
			//dd($session);
			$sessions[] = new Session(
				(string)$server->attributes()['name'],
				(string)$server->attributes()['host'],
				(string)$server->attributes()['address'],
				(int)$server->attributes()['port'],
				(string)$server->attributes()['machineIdentifier'],
				(string)$server->attributes()['version']
			);
		}
		return $sessions;
	}
}
