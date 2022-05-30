<div class="bg-white border rounded shadow p-2">
    <div class="flex flex-row items-center">
        <div class="flex-shrink pr-4">
            <div class="rounded p-3 {{ $color }}"><i class="{{ $icon }} fa-2x fa-fw fa-inverse"></i></div>
        </div>
        <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">{{ $title }}</h5>
            @if($value)
                <h3 class="font-bold text-3xl">{!! $value !!}</h3>
            @endif
        </div>
    </div>
</div>
