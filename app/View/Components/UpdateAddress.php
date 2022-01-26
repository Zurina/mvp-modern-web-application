<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UpdateAddress extends Component
{
    public $countries;
    public $address;

    public function __construct($countries = null, $address = null)
    {
        $this->countries = $countries ?? null;
        $this->address = $address ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.update-address');
    }
}
