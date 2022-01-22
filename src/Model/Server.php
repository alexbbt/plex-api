<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

final class Server
{
	public function __construct(
		private string $name,
		private string $host,
		private string $address,
		private int $port,
		private string $identifier,
		private string $version
	)
	{}

	public function getName(): string
	{
		return $this->name;
	}

	public function getHost(): string
	{
		return $this->host;
	}

	public function getAddress(): string
	{
		return $this->address;
	}

	public function getPort(): int
	{
		return $this->port;
	}

	public function getIdentifier(): string
	{
		return $this->identifier;
	}

	public function getVersion(): string
	{
		return $this->version;
	}

}
