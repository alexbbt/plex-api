<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

trait File
{
	private int $bitrate;
	private int $width;
	private int $height;
	private float $aspectRatio;
	private int $audioChannels;
	private string $audioCodec;
	private string $videoCodec;
	private int $resolution;
	private string $container;
	private string $framerate;
	private string $profile;

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
