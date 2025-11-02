<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StarBewertung extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct( public readonly ?float $bewertung)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.star-bewertung');
    }
}
