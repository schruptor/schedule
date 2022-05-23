<?php

namespace Schruptor\Schedule;

use Illuminate\Events\Dispatcher;

class Schedule
{
    public static function get(): \Illuminate\Support\Collection
    {
        $kernel = new (config('schedule.kernel-class'))(app(), new Dispatcher());

        $schedule = app(config('schedule.schedule-class'));

        return collect($schedule->events());
    }
}
