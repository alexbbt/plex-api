<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

trait File
{
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
