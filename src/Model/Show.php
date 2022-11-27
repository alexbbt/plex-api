<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

final class Show
{
    protected string $ratingKey;
    protected string $studio;
    protected string $contentRating;
    protected string $rating;
    protected string $title;
    protected string $summary;
    protected string $year = '';
    protected string $thumb = '';
    protected \DateTimeImmutable $createdAt;
    /** @var array<int, string> */
    protected array $actors;
    /** @var array<int, string> */
    protected array $genres;
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

    public function getRatingKey(): string
    {
        return $this->ratingKey;
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

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return array<int, string>
     */
    public function getActors(): array
    {
        return $this->actors;
    }

    /**
     * @return array<int, string>
     */
    public function getGenres(): array
    {
        return $this->genres;
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

	/**
	 * @param array<int, mixed> $arguments
	 */
	public function __call(string $method, array $arguments): mixed
	{
		if (method_exists($this, $method)) {
			return $this->$method(...$arguments);
		} elseif (count($this->episodes) > 0 && method_exists($this->episodes[0], $method)) {
			return $this->episodes[0]->$method(...$arguments);
		} else {
			return null;
		}
	}
}
