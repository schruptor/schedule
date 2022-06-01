<?php

namespace Schruptor\Schedule\Console;

use Illuminate\Console\Command;
use Schruptor\Schedule\Schedule;
use Schruptor\Schedule\Eloquent\Schedule as ScheduleEloquentModel;

class CacheRoutesCommand extends Command
{
    protected $signature = 'schruptor-schedule:cache-route';
    protected $description = 'This command caches your routes into a datasource of your choice.';

    public function handle(): bool
    {
        if (! config('schedule.caching.status')) {
            return false;
        }

        $this->purgeTable();

        $this->saveSchedules();

        return true;
    }

    private function saveSchedules(): void
    {
        foreach (Schedule::getFromRuntime() as $schedule) {
            ScheduleEloquentModel::create([
                'expression' => $schedule->expression,
                'user' => $schedule->user,
                'next_run_date' => $schedule->nextRunDate()->format('Y-m-d H:i:s'),
                'command' => $schedule->command,
                'description' => $schedule->description,
                'evenInMaintenanceMode' => $schedule->evenInMaintenanceMode,
                'withoutOverlapping' => $schedule->withoutOverlapping,
            ]);
        }
    }

    private function purgeTable(): void
    {
        foreach (ScheduleEloquentModel::all() as $schedule) {
            $schedule->delete();
        }
    }
}
