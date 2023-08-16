<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductServices extends Component
{
    public $products;
    public $services;
    public $num;

    public function mount($products, $services, $num)
    {
        $this->products = $products;
        $this->services = $services;
        $this->num = $num;
    }
    public function render()
    {
        return view('livewire.product-services');
    }
}
