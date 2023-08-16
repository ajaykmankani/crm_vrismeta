<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ProductAndServices extends Component
{
    /**
     * Create a new component instance.
     */
    public $products;
    public $services;
    public $for;

    public $categoryId;
    public function __construct($products, $services, $for, $categoryId)
    {
        $this->products = $products;
        $this->services = $services;
        $this->for = $for;
        $this->categoryId = $categoryId;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components\product_and_services');
    }
}
