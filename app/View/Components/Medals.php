<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Medals extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $attributes;

    public function __construct($type, $attributes = [])
    {
        $this->type = $type;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.'.$this->type);
    }
}
