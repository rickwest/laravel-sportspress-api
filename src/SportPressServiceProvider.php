<?php

namespace RickWest\SportsPress;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SportPressServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name('laravel-sportspress-api');
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(SportsPress::class, fn () => new SportsPress());
    }
}
