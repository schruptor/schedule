@if($schedules->first()->timezone)
    <x-card
        icon="fa fa-clock"
        color="bg-pink-600"
        title="TIMEZONE OF FIRST JOB"
        :value="$schedules->first()->timezone"
    />
@endif
