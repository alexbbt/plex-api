<?php

namespace Chindit\PlexApi\Model;

final class Episode extends Media
{
	use File;

	/** @var array<int, string> */
	private array $directors;
	/** @var array<int, string> */
	private array $writers;
	private int $season;
	private int $episode;

	/**
	 * @param array<string, mixed> $values
	 */
	public function __construct(array $values)
	{
		foreach ($values as $name => $value)
		{
			if ($name === 'addedAt' && is_string($value)) {
				$name = 'createdAt';
				$value = (new \DateTimeImmutable())->setTimestamp((int)$value);
			}
			if (property_exists($this, $name)) {
				$this->$name = $value;
			}
		}
	}

	/**
	 * @return array<string>
	 */
	public function getDirectors(): array
	{
		return $this->directors;
	}

	/**
	 * @return array<string>
	 */
	public function getWriters(): array
	{
		return $this->writers;
	}

	public function getSeason(): int
	{
		return $this->season;
	}

	public function getEpisode(): int
	{
		return $this->episode;
	}
}
