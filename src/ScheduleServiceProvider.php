<?php

namespace Schruptor\Schedule;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ScheduleServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('schedule')
            ->hasConfigFile()
            ->hasRoutes('web')
            ->hasViews();
    }
}
