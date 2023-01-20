<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function __construct(private Collection $tags)
    {}

    public function render(): View
    {
        return view('layouts.app', ['tags' => $this->tags]);
    }
}
