<?php

namespace App\View\Components\components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class popup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct($popup, $attributes)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popup');
    }
}
