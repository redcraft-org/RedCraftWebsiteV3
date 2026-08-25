<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * @param  string|null  $title  Name of the page, shown before the site name
     *                              in the browser tab. Null leaves the site name
     *                              on its own, which is what the home page wants.
     */
    public function __construct(public ?string $title = null)
    {
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
