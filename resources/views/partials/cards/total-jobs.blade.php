@include('schedule::partials.card', [
    'icon' => 'fa fa-calendar',
    'color' => 'bg-green-600',
    'title' => 'TOTAL JOBS',
    'value' => $schedules->count()
])
