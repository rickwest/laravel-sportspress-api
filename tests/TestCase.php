<?php

namespace RickWest\SportsPress\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use RickWest\SportsPress\SportsPressServiceProvider;

class TestCase extends Orchestra
{
    /**
     * {@inheritDoc}
     */
    protected function getPackageProviders($app): array
    {
        return [
            SportsPressServiceProvider::class,
        ];
    }
}
