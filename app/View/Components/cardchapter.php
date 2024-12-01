<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardchapter extends Component
{
    public $id;
    public $number;
    public $title;
    public $cover;
    public $date;

    public function __construct($id, $number, $title, $cover, $date)
    {
        $this->id = $id;
        $this->number = $number;
        $this->title = $title;
        $this->cover = $cover;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cardchapter');
    }
}
