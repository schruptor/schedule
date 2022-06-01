<?php

namespace Schruptor\Schedule\Eloquent;

use Carbon\Carbon;
use Cron\CronExpression;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Schruptor\Schedule\Database\Factories\ScheduleFactory;

/**
 * App\Models\Ping
 *
 * @property int $id
 * @property int $job_id
 * @property string|null $ip
 * @property string|null $expression
 * @property string|null $user
 * @property carbon|null $next_run_date
 * @property string|null $command
 * @property string|null $description
 * @property bool|null $evenInMaintenanceMode
 * @property bool|null $withoutOverlapping
 * @method static ScheduleFactory factory(...$parameters)
 * @method static Builder|Schedule newModelQuery()
 * @method static Builder|Schedule newQuery()
 * @method static Builder|Schedule query()
 * @method static Builder|Schedule whereCount($value)
 * @method static Builder|Schedule whereCreatedAt($value)
 * @method static Builder|Schedule whereId($value)
 * @method static Builder|Schedule whereIp($value)
 * @method static Builder|Schedule whereJobId($value)
 * @method static Builder|Schedule whereUpdatedAt($value)
 * @mixin \Eloquent
 */

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

    public function nextRunDate(): Carbon
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
