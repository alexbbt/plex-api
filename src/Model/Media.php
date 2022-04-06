<?php

namespace Chindit\PlexApi\Model;

abstract class Media
{
	protected string $ratingKey;
	protected string $studio;
	protected string $contentRating;
	protected string $rating;
	protected string $title;
	protected string $summary;
	protected string $year = '';
	protected string $thumb;
	protected string $duration;
	protected \DateTimeImmutable $createdAt;
	/** @var array<int, string> */
	protected array $actors;
	/** @var array<int, string> */
	protected array $genres;

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
		return $this->thumb ?? '';
	}

	public function getDuration(): int
	{
		return (int)round(((int)($this->duration ?? 0)/1000));
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
