<?php

namespace Schruptor\Schedule;

use Spatie\LaravelPackageTools\Package;
use Schruptor\Schedule\Components\Card;
use Schruptor\Schedule\Components\Header;
use Schruptor\Schedule\Components\IconStatus;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ScheduleServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('schedule')
            ->hasConfigFile()
            ->hasRoutes('web')
            ->hasViewComponent('', Card::class)
            ->hasViewComponent('', IconStatus::class)
            ->hasViewComponent('', Header::class)
            ->hasViews();
    }
}
