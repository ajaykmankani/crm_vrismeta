<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SelectComponent extends Component
{

    public $name;
    public $title;
    public $options;
    public $variables;
    public $div_variable;

    public function mount($name, $title, $options, $variables = '', $div_variable = '')
    {
        $this->name = $name;
        $this->title = $title;
        $this->options = $options;
        $this->variables = $variables;
        $this->div_variable  = $div_variable;
    }

    public function render()
    {
        return view('livewire.select-component');
    }
}
