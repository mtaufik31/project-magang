<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardblog extends Component
{
    /**
     * Create a new component instance.
     */

    public $id;
    public $title;
    public $name;
    public $description;
    public $image;




    public function __construct($id, $title, $name, $description, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cardblog');
    }
}
