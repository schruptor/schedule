<x-card
    icon="fa fa-check"
    color="bg-green-600"
    title="LAST CACHED AT"
    :value="$schedules->first()->created_at->format(config('schedule.caching.format'))"
/>
