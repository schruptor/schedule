<?php

namespace Schruptor\Schedule\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component as BaseComponent;

class Card extends BaseComponent
{
    public function __construct(
        public string $title,
        public null|string|int|float $value = '',
        public string $icon = 'fa fa-user',
        public string $color = 'bg-green-600',
    ) {
    }

    public function render(): View
    {
        return view('schedule::components.card');
    }
}
