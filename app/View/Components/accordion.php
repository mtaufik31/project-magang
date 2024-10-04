<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class accordion extends Component
{
    public $title;
    public $id;

    public function __construct($title, $id)
    {
        $this->title = $title;
        $this->id = $id;
    }

    public function render()
    {
        return view('components.accordion');
    }
}

