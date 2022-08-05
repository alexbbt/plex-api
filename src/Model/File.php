<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

trait File
{
	private int $audioChannels;
	private int $resolution;
	private string $framerate;
	private string $profile;

	public function getAudioChannels(): int
	{
		return $this->audioChannels;
	}

	public function getResolution(): int
	{
		return $this->resolution;
	}

	public function getProfile(): string
	{
		return $this->profile;
	}

	public function getFramerate(): string
	{
		return $this->framerate;
	}
}
