<?php

namespace Schruptor\Schedule\Eloquent;

use Carbon\Carbon;
use Cron\CronExpression;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Schedule extends Model
{
    protected $table = 'schedule';

    protected $fillable = [
        'expression',
        'user',
        'next_run_date',
        'command',
        'description',
        'evenInMaintenanceMode',
        'withoutOverlapping',
    ];

    public function nextRunDate()
    {
        return new Carbon((new CronExpression($this->expression))->getNextRunDate(
            currentTime: now(),
            timeZone: config('app.timezone'),
        ));
    }

    public function timezone(): Attribute
    {
        return new Attribute(
            get: fn () => $this->nextRunDate()->timezoneAbbreviatedName,
        );
    }
}
