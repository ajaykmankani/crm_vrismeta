<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TextComponent extends Component
{
    public $name;
    public $title;
    public $type;
    public $variables;

    public function mount($name, $title, $type = 'text', $variables = '')
    {
        $this->name = $name;
        $this->title = $title;
        $this->type = $type;
        $this->variables = $variables;
    }

    public function render()
    {
        return view('livewire.text-component');
    }
}
