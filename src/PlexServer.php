<?php
declare(strict_types=1);

namespace Chindit\PlexApi;

use Chindit\PlexApi\Enum\LibraryType;
use Chindit\PlexApi\Model\Library;
use Chindit\PlexApi\Model\Server;
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
	 * @return int
	 */
	public function sessionsCount(): int
	{
		$serverResponse = $this->connector->get('/status/sessions');

		return (int)$serverResponse->attributes()['size'];
	}

	public function libraries(): array
	{
		$serverResponse = $this->connector->get('/library/sections');

		$libraries = [];

		foreach ($serverResponse->Directory as $library) {
			$libraries[] = new Library(
				(int)$library->attributes()['key'],
				$library->attributes()['allowSync'] === '1',
				(string)$library->attributes()['thumb'],
				match ($library->attributes()['type']) {
					'movie' => LibraryType::Movie,
					'show' => LibraryType::Show,
					'artist' => LibraryType::Music,
					default => throw new \InvalidArgumentException(sprintf("Collection type %s in not supported", $library->attributes()['type']))
				},
				(string)$library->attributes()['title'],
				(string)$library->attributes()['language'],
				(new \DateTimeImmutable())->setTimestamp((int)$library->attributes()['createdAt']),
				(new \DateTimeImmutable())->setTimestamp((int)$library->attributes()['updatedAt']),
				(new \DateTimeImmutable())->setTimestamp((int)$library->attributes()['scannedAt']),
				(string)$library->Location->attributes()['Location']
			);
		}
		return $libraries;
	}
}
