<?php

namespace Schruptor\Schedule;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Collection;
use Schruptor\Schedule\Eloquent\Schedule as ScheduleEloquentModel;

class Schedule
{
    public static function get(): Collection
    {
        if (config('schedule.caching.status') === true) {
            return match (config('schedule.caching.destination')) {
                'database' => (new self())->getSchedulesFromDatabase()
            };
        }

        return (new self())->getSchedulesFromRuntime();
    }

    public static function getFromRuntime(): Collection
    {
        return (new self())->getSchedulesFromRuntime();
    }

    private function getSchedulesFromDatabase(): Collection
    {
        return ScheduleEloquentModel::all();
    }

    private function getSchedulesFromRuntime(): Collection
    {
        new (config('schedule.kernel-class'))(app(), new Dispatcher());

        $schedule = app(config('schedule.schedule-class'));

        return collect($schedule->events());
    }
}
