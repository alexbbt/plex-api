<?php
declare(strict_types=1);

namespace Chindit\PlexApi;

use Chindit\Collection\Collection;
use Chindit\PlexApi\Enum\LibraryType;
use Chindit\PlexApi\Model\Library;
use Chindit\PlexApi\Model\Movie;
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

	public function library(int $libraryId)
	{
		$serverResponse = $this->connector->get('/library/sections/' . $libraryId . '/all');

		$items = [];

		foreach ($serverResponse as $item) {
			switch((string)$item->attributes()['type'])
			{
				case 'movie':
					$mediaAttributes = $item->Media->attributes();
					$items[] = Movie::hydrate(array_merge(
						array_values((array)$item->attributes())[0],
						['genres' => (new Collection($item->xpath('Genre')))->map(fn(\SimpleXMLElement $element) => (array)$element->attributes())->flatten()->toArray()],
						['directors' => (new Collection($item->xpath('Director')))->map(fn(\SimpleXMLElement $element) => (array)$element->attributes())->flatten()->toArray()],
						['writers' => (new Collection($item->xpath('Writer')))->map(fn(\SimpleXMLElement $element) => (array)$element->attributes())->flatten()->toArray()],
						['countries' => (new Collection($item->xpath('Country')))->map(fn(\SimpleXMLElement $element) => (array)$element->attributes())->flatten()->toArray()],
						['actors' => (new Collection($item->xpath('Role')))->map(fn(\SimpleXMLElement $element) => (array)$element->attributes())->flatten()->toArray()],
						[
							'bitrate' => (int)$mediaAttributes['bitrate'],
							'width' => (int)$mediaAttributes['width'],
							'height' => (int)$mediaAttributes['height'],
							'aspectRatio' => (float)$mediaAttributes['aspectRatio'],
							'audioChannels' => (int)$mediaAttributes['audioChannels'],
							'audioCodec' => $mediaAttributes['audioCodec'],
							'videoCodec' => $mediaAttributes['videoCodec'],
							'resolution' => (int)$mediaAttributes['videoResolution'],
							'container' => $mediaAttributes['container'],
							'framerate' => $mediaAttributes['framerate'],
							'profile' => $mediaAttributes['profile'],
						]
					));
					break;
				default:
					throw new \InvalidArgumentException(sprintf("Collection type %s in not supported", $item->attributes()['type']));
			}
		}

		return $items;
	}
}
