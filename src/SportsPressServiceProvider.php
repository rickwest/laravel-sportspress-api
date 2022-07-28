<?php

namespace RickWest\SportsPress;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SportsPressServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-sportspress-api');
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(SportsPress::class, fn () => new SportsPress());
    }
}
