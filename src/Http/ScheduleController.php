<?php

namespace Schruptor\Schedule\Http;

use Illuminate\View\Factory;
use Schruptor\Schedule\Schedule;
use Illuminate\Contracts\View\View;

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
