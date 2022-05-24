<?php

namespace Schruptor\Schedule\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component as BaseComponent;

class Header extends BaseComponent
{
    public function render(): View
    {
        return view('schedule::components.header');
    }
}
