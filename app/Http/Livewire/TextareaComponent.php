<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TextareaComponent extends Component
{

    public $name;
    public $title;
    public $variables;

    public function mount($name, $title, $variables = '')
    {
        $this->name = $name;
        $this->title = $title;
        $this->variables = $variables;
    }

    public function render()
    {
        return view('livewire.textarea-component');
    }
}
