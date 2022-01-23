<?php

namespace Chindit\PlexApi\Service;

use Chindit\Collection\Collection;

/**
 * @internal
 */
class XmlParser
{
	public static function getGlobalAttributes(\SimpleXMLElement $item): array
	{
		return [
			array_values((array)$item->attributes())[0],
			['genres' => (new Collection($item->xpath('Genre')))->map(fn(\SimpleXMLElement $element) => (array)$element->attributes())->flatten()->toArray()],
			['directors' => (new Collection($item->xpath('Director')))->map(fn(\SimpleXMLElement $element) => (array)$element->attributes())->flatten()->toArray()],
			['writers' => (new Collection($item->xpath('Writer')))->map(fn(\SimpleXMLElement $element) => (array)$element->attributes())->flatten()->toArray()],
			['countries' => (new Collection($item->xpath('Country')))->map(fn(\SimpleXMLElement $element) => (array)$element->attributes())->flatten()->toArray()],
			['actors' => (new Collection($item->xpath('Role')))->map(fn(\SimpleXMLElement $element) => (array)$element->attributes())->flatten()->toArray()],
		];
	}

	public static function getTechnicalAttributes(\SimpleXMLElement $item): array
	{
		/** @var \SimpleXMLElement $mediaAttributes */
		$mediaAttributes = $item->Media->attributes();

		return [
			'bitrate' => (int)$mediaAttributes['bitrate'],
			'width' => (int)$mediaAttributes['width'],
			'height' => (int)$mediaAttributes['height'],
			'aspectRatio' => (float)$mediaAttributes['aspectRatio'],
			'audioChannels' => (int)$mediaAttributes['audioChannels'],
			'audioCodec' => (string)$mediaAttributes['audioCodec'],
			'videoCodec' => (string)$mediaAttributes['videoCodec'],
			'resolution' => (int)$mediaAttributes['videoResolution'],
			'container' => (string)$mediaAttributes['container'],
			'framerate' => (string)$mediaAttributes['videoFrameRate'],
			'profile' => (string)$mediaAttributes['videoProfile'],
		];
	}
}
