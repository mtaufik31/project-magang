<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class points extends Component
{
    /**
     * Create a new component instance.
     */

    public $point;
    public function __construct( $point)
    {
        $this->point = $point;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.points');
    }
}
