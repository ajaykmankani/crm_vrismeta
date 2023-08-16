<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TextareaComponentEdit extends Component
{
    public $data;
    public $name;
    public $title;
    public $variables;

    public function mount($data, $name, $title, $variables = '')
    {
        $this->data = $data;
        $this->name = $name;
        $this->title = $title;
        $this->variables = $variables;
    }

    public function render()
    {
        return view('livewire.textarea-component-edit');
    }
}
