<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

final class Show extends Media
{
	private int $seasonCount;
	private int $totalEpisodes;
	/** @var array<int, Episode> */
	private array $episodes;

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

	public function getSeasonCount(): int
	{
		return $this->seasonCount;
	}

	public function getTotalEpisodes(): int
	{
		return $this->totalEpisodes;
	}

	/**
	 * @return array<Episode>
	 */
	public function getEpisodes(): array
	{
		return $this->episodes;
	}
}
