<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class accordion extends Component
{
    public $title;
    public $id;
    public $isSidebar;

    public function __construct($title, $id, $isSidebar = false)
    {
        $this->title = $title;
        $this->id = $id;
        $this->isSidebar = $isSidebar;
    }

    public function render()
    {
        return view('components.accordion');
    }
}

