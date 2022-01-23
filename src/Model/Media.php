<?php

namespace Chindit\PlexApi\Model;

abstract class Media
{
	public readonly string $ratingKey;
	public readonly string $studio;
	public readonly string $contentRating;
	public readonly string $rating;
	public readonly string $title;
	public readonly string $summary;
	public readonly string $year;
	public readonly string $thumb;
	public readonly string $duration;
	public readonly \DateTimeImmutable $createdAt;
	public readonly array $actors;
	public readonly array $genres;

	public function getId(): int
	{
		return (int)$this->ratingKey;
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
	public function getActors(): array
	{
		return $this->actors;
	}

	/**
	 * @return array<string>
	 */
	public function getGenres(): array
	{
		return $this->genres;
	}
}
