<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class statusmanga extends Component
{
    /**
     * Create a new component instance.
     */

     public $judul;
    public function __construct($judul)
    {
        $this->judul = $judul;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.statusmanga');
    }
}
