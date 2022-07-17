<?php

namespace RickWest\SportsPress\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RickWest\SportsPress\SportsPress
 * @mixin \RickWest\SportsPress\SportsPress
 */
class SportsPress extends Facade
{
    /**
     * @inheritDoc
     */
    protected static function getFacadeAccessor()
    {
        return \RickWest\SportsPress\SportsPress::class;
    }
}
