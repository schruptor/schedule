<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('schedule.view.title') }}</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    <style>
        /* Tooltip container */
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
        }

        /* Tooltip text */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;

            /* Position the tooltip text */
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;

            /* Fade in tooltip */
            opacity: 0;
            transition: opacity 0.3s;
        }

        /* Tooltip arrow */
        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    @include('schedule::partials.navbar')

    <div class="container w-full mx-auto pt-10">

        <div class="w-full px-4 md:px-0 md:mt-8 mb-10 text-gray-800 leading-normal">

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

            <div class="mt-2 mx-4">
                @include('schedule::partials.data-table', ['schedules' => $schedules])
            </div>

        </div>
    </div>
</body>
</html>
