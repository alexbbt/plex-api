<?php

namespace Chindit\PlexApi\Model;

final class Artist
{
	private string $artist;
	private string $description;
	private string $thumb;
	/** @var array<int, string> */
	private array $genres;
	/** @var array<int, string> */
	private array $countries;
    /** @var array<int, Album> */
    private array $albums;

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

	public function getArtist(): string
	{
		return $this->artist;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function getThumb(): string
	{
		return $this->thumb;
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
	public function getCountries(): array
	{
		return $this->countries;
	}

    /**
     * @return Album[]
     */
    public function getAlbums(): array
    {
        return $this->albums;
    }
}
