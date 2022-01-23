<?php

namespace Chindit\PlexApi\Model;

final class Episode
{
	use File;

	public readonly array $directors;
	public readonly array $writers;
	public readonly int $season;
	public readonly int $episode;

	public function __construct(array $values)
	{
		foreach ($values as $name => $value)
		{
			if ($name === 'addedAt') {
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
