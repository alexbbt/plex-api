<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

final class Album
{
	private string $studio;
	private string $title;
	private string $description;
	private string $thumb;
	private \DateTime $releasedAt;
	/** @var array<int, string> */
	private array $genres;
	/** @var array<int, string> */
	private array $directors;
    /** @var array<int, MusicTrack> */
    private array $tracks;

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

	public function getStudio(): string
	{
		return $this->studio;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function getThumb(): string
	{
		return $this->thumb;
	}

	public function getReleasedAt(): \DateTime
	{
		return $this->releasedAt;
	}

	/**
	 * @return array<int, string>
	 */
	public function getGenres(): array
	{
		return $this->genres;
	}

	/**
	 * @return array<int, string>
	 */
	public function getDirectors(): array
	{
		return $this->directors;
	}

    /**
     * @return MusicTrack[]
     */
    public function getTracks(): array
    {
        return $this->tracks;
    }
}
