<?php

namespace RickWest\SportsPress\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use RickWest\SportsPress\SportPressServiceProvider;

class TestCase extends Orchestra
{
    /**
     * @inheritDoc
     */
    protected function getPackageProviders($app)
    {
        return [
            SportPressServiceProvider::class,
        ];
    }
}
