<?php

use Illuminate\Support\Facades\Route;
use Schruptor\Schedule\Http\ScheduleController;

Route::get(config('schedule.url'), ScheduleController::class)
    ->middleware(config('schedule.route-middlewares'))
    ->name('schedule.index');
