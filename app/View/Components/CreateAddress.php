<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateAddress extends Component
{
    public $countries;

    public function __construct($countries = null)
    {
        $this->countries = $countries ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.create-address');
    }
}
