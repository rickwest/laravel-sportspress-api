<?php

use Illuminate\Contracts\Foundation\Application;
use RickWest\SportsPress\SportsPress;

if (! function_exists("sportspress")) {

    /**
     * @return Application|mixed|SportsPress
     * @throws Exception
     */
    function sportspress()
    {
        return app(SportsPress::class);
    }
}
