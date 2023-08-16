<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CompanyServices extends Component
{
    public $name;
    public $title;
    public $options;

    public function mount($name, $title, $options)
    {
        $this->name = $name;
        $this->title = $title;
        $this->options = $options;
    }
    public function render()
    {
        return view('livewire.company-services');
    }
}
