<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-header />
    </head>

    <body class="bg-gray-100 font-sans leading-normal tracking-normal">

        @include('schedule::partials.navbar')

        <div class="container w-full mx-auto pt-10">

            <div class="w-full px-4 md:px-0 md:mt-8 mb-10 text-gray-800 leading-normal">

                @if(config('schedule.caching.status'))
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                            @include("schedule::partials.cards.caching-status")
                        </div>

                        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                            @include("schedule::partials.cards.caching-destination")
                        </div>

                        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                            @include("schedule::partials.cards.caching-last-cache")
                        </div>
                    </div>
                @endif

                @if(config('schedule.view.cards'))
                    <div class="flex flex-wrap">
                        @foreach(config('schedule.view.cards') as $card)
                            @if (Str::contains($card, '/') || Str::startsWith($card, 'custom:'))
                                @if (View::exists(Str::remove('custom:', $card)))
                                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                        @include(Str::remove('custom:', $card))
                                    </div>
                                @endif
                            @endif
                            @if (View::exists("schedule::partials.cards.$card"))
                                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                    @include("schedule::partials.cards.$card")
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!--Divider-->
                    <hr class="border-b-2 border-gray-400 my-8 mx-4">
                @endif

                <div class="mt-2 mx-4">
                    @include('schedule::partials.data-table', ['schedules' => $schedules])
                </div>

            </div>
        </div>
    </body>
</html>
