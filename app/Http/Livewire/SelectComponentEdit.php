<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SelectComponentEdit extends Component
{
    public $data;
    public $name;
    public $title;
    public $options;
    public $variables;
    public $div_variable;

    public function mount($data, $name, $title, $options, $variables='',$div_variable ='')
    {
        $this->data = $data;
        $this->name = $name;
        $this->title = $title;
        $this->options = $options;
        $this->variables = $variables;
        $this->div_variable = $div_variable;
    }
    public function render()
    {
        return view('livewire.select-component-edit');
    }
}
