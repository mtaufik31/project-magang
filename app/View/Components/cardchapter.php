<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardchapter extends Component
{
    public $chapterId;
    public $number;
    public $title;
    public $cover;
    public $date;
    public $chapterRoute;

    public function __construct(
        $chapterId = null,
        $number = null,
        $title = null,
        $cover = null,
        $date = null,
        $chapterRoute = null
    ) {
        $this->chapterId = $chapterId;
        $this->number = $number;
        $this->title = $title;
        $this->cover = $cover;
        $this->date = $date;
        $this->chapterRoute = $chapterRoute;
    }

    public function render()
    {
        return view('components.cardchapter');
    }
}
