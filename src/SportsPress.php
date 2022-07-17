<?php

namespace RickWest\SportsPress;

use RickWest\SportsPress\Resources\Calendars;
use RickWest\SportsPress\Resources\Events;
use RickWest\SportsPress\Resources\Leagues;
use RickWest\SportsPress\Resources\Players;
use RickWest\SportsPress\Resources\Positions;
use RickWest\SportsPress\Resources\Roles;
use RickWest\SportsPress\Resources\Seasons;
use RickWest\SportsPress\Resources\Staff;
use RickWest\SportsPress\Resources\Teams;
use RickWest\SportsPress\Resources\Venues;
use RickWest\Wordpress\BaseWordpress;

/**
 * @method Calendars calendars()
 * @method Events events()
 * @method Leagues leagues()
 * @method Players players()
 * @method Positions positions()
 * @method Roles roles()
 * @method Seasons seasons()
 * @method Staff staff()
 * @method Teams teams()
 * @method Venues venues()
 */
class SportsPress extends BaseWordpress
{
    protected array $resources = [
        'calendars' => Calendars::class,
        'events' => Events::class,
        'leagues' => Leagues::class,
        'players' => Players::class,
        'positions' => Positions::class,
        'roles' => Roles::class,
        'seasons' => Seasons::class,
        'staff' => Staff::class,
        'teams' => Teams::class,
        'venues' => Venues::class,
    ];
}
