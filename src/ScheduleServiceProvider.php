<?php

namespace Schruptor\Schedule;

use Schruptor\Schedule\Components\Card;
use Spatie\LaravelPackageTools\Package;
use Schruptor\Schedule\Components\Header;
use Schruptor\Schedule\Components\IconStatus;
use Schruptor\Schedule\Console\CacheRoutesCommand;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ScheduleServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('schedule')
            ->hasConfigFile()
            ->hasRoutes('web')
            ->hasCommand(CacheRoutesCommand::class)
            ->hasViewComponent('', Card::class)
            ->hasViewComponent('', IconStatus::class)
            ->hasViewComponent('', Header::class)
            ->hasMigration('create_schedule_table')
            ->hasViews();
    }
}
