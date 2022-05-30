<?php

namespace Schruptor\Schedule\Database\Factories;

use Schruptor\Schedule\Eloquent\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'expression' => $this->faker->randomElement([
                '* * * * *',
                '* 6 * * *',
                '* 12 * * *',
                '* 18 * * *',
                '15 1 * * *',
                '30 7 * * *',
                '45 13 * * *',
            ]),
            'user' => $this->faker->userName(),
            'next_run_date' => $this->faker->date,
            'command' => $this->faker->words(5),
            'description' => $this->faker->words(10),
            'evenInMaintenanceMode' => $this->faker->boolean(),
            'withoutOverlapping' => $this->faker->boolean(),
        ];
    }
}
