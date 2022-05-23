<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                @if(config('schedule.view.table-fields.next-run-date'))
                    <th scope="col" class="px-6 py-3">Next run Date</th>
                @endif
                @if(config('schedule.view.table-fields.expression'))
                    <th scope="col" class="px-6 py-3">Expression</th>
                @endif
                @if(config('schedule.view.table-fields.command'))
                    <th scope="col" class="px-6 py-3">Command</th>
                @endif
                @if(config('schedule.view.table-fields.user'))
                    <th scope="col" class="px-6 py-3">User</th>
                @endif
                @if(config('schedule.view.table-fields.description'))
                    <th scope="col" class="px-6 py-3">Description</th>
                @endif
                @if(config('schedule.view.table-fields.evenInMaintenanceMode'))
                    <th scope="col" class="px-6 py-3">In Maintenance Mode</th>
                @endif
                @if(config('schedule.view.table-fields.withoutOverlapping'))
                    <th scope="col" class="px-6 py-3">Without Overlapping</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    @if(config('schedule.view.table-fields.next-run-date'))
                        <td class="px-6 py-4">
                            @if(!config('schedule.view.table-fields.expression'))
                                <div class="tooltip">{{ $schedule->nextRunDate()->format('Y-m-d H:i:s') }}
                                    <span class="tooltiptext">{{ $schedule->expression }}</span>
                                </div>
                            @else
                                {{ $schedule->nextRunDate()->format('Y-m-d H:i:s') }}
                            @endif
                        </td>
                    @endif
                    @if(config('schedule.view.table-fields.expression'))
                        <td class="px-6 py-4">
                            {{ $schedule->expression }}
                        </td>
                    @endif
                    @if(config('schedule.view.table-fields.command'))
                        <td class="px-6 py-4">
                            @if ($schedule->command)
                                @php
                                    preg_match("/'artisan'(.*)/", $schedule->command, $matches)
                                @endphp

                                {{ $matches[1] }}
                            @else
                                Closure was given for {{ config('schedule.view.table-fields.command-closure-with-description') ? $schedule->description : '' }}
                            @endif
                        </td>
                    @endif
                    @if(config('schedule.view.table-fields.user'))
                        <td class="px-6 py-4">
                            {{ $schedule->user ?? 'default' }}
                        </td>
                    @endif
                    @if(config('schedule.view.table-fields.description'))
                        <td class="px-6 py-4">
                            {{ $schedule->description }}
                        </td>
                    @endif
                    @if(config('schedule.view.table-fields.evenInMaintenanceMode'))
                        <td class="px-6 py-4">
                            @include($schedule->evenInMaintenanceMode ? "schedule::partials.icons.check" : "schedule::partials.icons.times")
                        </td>
                    @endif
                    @if(config('schedule.view.table-fields.withoutOverlapping'))
                        <td class="px-6 py-4">
                            @include($schedule->withoutOverlapping ? "schedule::partials.icons.check" : "schedule::partials.icons.times")
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
