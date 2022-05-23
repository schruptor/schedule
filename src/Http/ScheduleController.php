<?php

namespace Schruptor\Schedule\Http;

use Illuminate\Contracts\View\View;
use Illuminate\View\Factory;
use Schruptor\Schedule\Schedule;

class ScheduleController
{
    public function __invoke(Factory $view): View
    {
        return $view->make(
            'schedule::index',
            ['schedules' => Schedule::get()]
        );
    }
}
