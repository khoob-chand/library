<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public $id;
    public $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type =null ,$name=null ,$id=null ,$label =null)
    {
        $this->type=$type;
        $this->name=$name;
        $this->id=$id;
        $this->label=$label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
