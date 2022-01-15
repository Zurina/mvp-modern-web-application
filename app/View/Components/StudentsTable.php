<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StudentsTable extends Component
{
    public $students;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($students = null)
    {
        $this->students = $students ?? null;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.students-table');
    }
}
