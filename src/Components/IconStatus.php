<?php

namespace Schruptor\Schedule\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component as BaseComponent;

class IconStatus extends BaseComponent
{
    public function __construct(
        public bool $status
    ) {
    }

    public function render(): View
    {
        return view('schedule::components.icon-status');
    }
}
