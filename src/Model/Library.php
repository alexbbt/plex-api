<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

use Chindit\PlexApi\Enum\LibraryType;

final class Library
{
	public function __construct(
		private int $id,
		private bool $allowSync,
		private string $thumbnail,
		private LibraryType $type,
		private string $title,
		private string $language,
		private \DateTimeImmutable $createdAt,
		private \DateTimeImmutable $updatedAt,
		private \DateTimeImmutable $scannedAt,
		private string $path
	)
	{}

	public function getId(): int
	{
		return $this->id;
	}

	public function isAllowSync(): bool
	{
		return $this->allowSync;
	}

	public function getThumbnail(): string
	{
		return $this->thumbnail;
	}

	public function getType(): LibraryType
	{
		return $this->type;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getLanguage(): string
	{
		return $this->language;
	}

	public function getCreatedAt(): \DateTimeImmutable
	{
		return $this->createdAt;
	}

	public function getUpdatedAt(): \DateTimeImmutable
	{
		return $this->updatedAt;
	}

	public function getScannedAt(): \DateTimeImmutable
	{
		return $this->scannedAt;
	}

	public function getPath(): string
	{
		return $this->path;
	}
}
