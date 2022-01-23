<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

final class Movie extends Media
{
	use File;

	/** @var array<int, string> */
	private array $directors;
	/** @var array<int, string> */
	private array $countries;
	/** @var array<int, string> */
	private array $writers;

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
	public function getCountries(): array
	{
		return $this->countries;
	}

	/**
	 * @return array<string>
	 */
	public function getWriters(): array
	{
		return $this->writers;
	}
}
