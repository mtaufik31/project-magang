<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardmanga extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $image;
    public $title;
    public $author;
    public $description;
    public $status;

    public function __construct($id ,$title, $author, $description, $image, $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->description = $description;
        $this->image = $image;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cardmanga');
    }
}
