<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TextComponentEdit extends Component
{
    public $data;
    public $name;
    public $title;
    public $type;
    public $variables;

    public function mount($data, $name, $title, $type = 'text', $variables = '')
    {
        $this->data = $data;
        $this->name = $name;
        $this->title = $title;
        $this->type = $type;
        $this->variables = $variables;
    }
    public function render()
    {
        return view('livewire.text-component-edit');
    }
}
