<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropdownContries extends Component
{
    public $countries;
    
    public function __construct($countries = null)
    {
        $this->countries = $countries ?? null;
    }


    public function render()
    {
        return view('components.dropdown-countries');
    }
}
