<?php
declare(strict_types=1);

namespace Chindit\PlexApi\Model;

final class Movie
{
	public static function hydrate(array $values): self
	{
		return new Movie();
	}
}
