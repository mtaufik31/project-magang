<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class swiper extends Component
{
    /**
     * Create a new component instance.
     */

    public $id,$image, $genres, $description, $status, $title, $number;
    public function __construct($id, $image, $genres, $description, $status, $title, $number)
    {
        $this->id = $id;
        $this->image = $image;
        $this->genres = $genres;
        $this->description = $description;
        $this->status = $status;
        $this->title = $title;
        $this->number = $number;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.swiper');
    }
}
