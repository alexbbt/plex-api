<?php
declare(strict_types=1);

namespace Chindit\PlexApi;

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
	 * @return array
	 */
	public function servers(): array
	{

	}
}
