<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

final class MusicTrack
{
	private string $title;
	private string $thumb;
	private int $duration;
	private int $bitrate;
	private int $audioChannels;
	private string $audioCodec;
	private string $container;

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

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getThumb(): string
	{
		return $this->thumb;
	}

	public function getDuration(): int
	{
		return $this->duration;
	}

	public function getBitrate(): int
	{
		return $this->bitrate;
	}

	public function getAudioChannels(): int
	{
		return $this->audioChannels;
	}

	public function getAudioCodec(): string
	{
		return $this->audioCodec;
	}

	public function getContainer(): string
	{
		return $this->container;
	}
}
