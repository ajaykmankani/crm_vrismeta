<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class productServices extends Component
{
    /**
     * Create a new component instance.
     */

    public $products;
    public $services;
    public $num;
    public function __construct($products, $services, $num)
    {
        $this->products = $products;
        $this->services = $services;
        $this->num = $num;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-services');
    }
}
