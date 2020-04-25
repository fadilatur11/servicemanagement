<?php

namespace App\View\Components;

use Illuminate\View\Component;

class headerlogin extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // public $name;
    public function __construct()
    {
        // $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.headerlogin');
    }
}
