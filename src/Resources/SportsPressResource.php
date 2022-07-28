<?php

namespace RickWest\SportsPress\Resources;

use RickWest\WordPress\Resources\Resource;
use RickWest\WordPress\Resources\Traits\HasSlug;

abstract class SportsPressResource extends Resource
{
    use HasSlug;

    /**
     * @inheritDoc
     */
    protected function endpoint(): string
    {
        return '/wp-json/sportspress/v2/'.$this->name();
    }
}
