<?php

namespace Chindit\PlexApi\Model;

abstract class Media
{
	protected readonly string $ratingKey;
	protected readonly string $studio;
	protected readonly string $contentRating;
	protected readonly string $rating;
	protected readonly string $title;
	protected readonly string $summary;
	protected readonly string $year;
	protected readonly string $thumb;
	protected readonly string $duration;
	protected readonly \DateTimeImmutable $createdAt;
	protected readonly array $actors;
	protected readonly array $genres;

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
