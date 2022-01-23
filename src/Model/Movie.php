<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

final class Movie
{
	public readonly string $studio;
	public readonly string $contentRating;
	public readonly string $rating;
	public readonly string $title;
	public readonly string $summary;
	public readonly string $year;
	public readonly string $thumb;
	public readonly string $duration;
	public readonly \DateTimeImmutable $createdAt;
	public readonly array $directors;
	public readonly array $actors;
	public readonly array $countries;
	public readonly array $writers;
	public readonly array $genres;

	public static function hydrate(array $values): self
	{
		$movie = new self();
		foreach ($values as $name => $value)
		{
			if ($name === 'addedAt') {
				$name = 'createdAt';
				$value = (new \DateTimeImmutable())->setTimestamp((int)$value);
			}
			if (property_exists($movie, $name)) {
				$movie->$name = $value;
			}
		}

		return $movie;
	}
}
