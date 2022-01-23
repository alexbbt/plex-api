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
	public readonly int $bitrate;
	public readonly int $width;
	public readonly int $height;
	public readonly float $aspectRatio;
	public readonly int $audioChannels;
	public readonly string $audioCodec;
	public readonly string $videoCodec;
	public readonly int $resolution;
	public readonly string $container;
	public readonly string $framerate;
	public readonly string $profile;

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

	public function getStudio(): string
	{
		return $this->studio;
	}

	public function getContentRating(): string
	{
		return $this->contentRating;
	}

	public function getRating(): string
	{
		return $this->rating;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getSummary(): string
	{
		return $this->summary;
	}

	public function getYear(): string
	{
		return $this->year;
	}

	public function getThumb(): string
	{
		return $this->thumb;
	}

	public function getDuration(): int
	{
		return (int)round(((int)$this->duration/1000));
	}

	public function getCreatedAt(): \DateTimeImmutable
	{
		return $this->createdAt;
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
	public function getActors(): array
	{
		return $this->actors;
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

	/**
	 * @return array<string>
	 */
	public function getGenres(): array
	{
		return $this->genres;
	}

	public function getBitrate(): int
	{
		return $this->bitrate;
	}

	public function getWidth(): int
	{
		return $this->width;
	}

	public function getHeight(): int
	{
		return $this->height;
	}

	public function getAspectRatio(): float
	{
		return $this->aspectRatio;
	}

	public function getAudioChannels(): int
	{
		return $this->audioChannels;
	}

	public function getAudioCodec(): string
	{
		return $this->audioCodec;
	}

	public function getVideoCodec(): string
	{
		return $this->videoCodec;
	}

	public function getResolution(): int
	{
		return $this->resolution;
	}

	public function getContainer(): string
	{
		return $this->container;
	}

	public function getFramerate(): string
	{
		return $this->framerate;
	}

	public function getProfile(): string
	{
		return $this->profile;
	}
}
