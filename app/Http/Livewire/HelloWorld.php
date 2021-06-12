<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name = "fendi";
    public $checkbox = "true";
    public $select = "Hello";

    public function render()
    {
        return view('livewire.hello-world');
    }
}
