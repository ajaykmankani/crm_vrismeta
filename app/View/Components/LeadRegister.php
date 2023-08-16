<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class LeadRegister extends Component
{
    /**
     * Create a new component instance.
     */

public $categories;
    public $services;
    public $products;
    public function __construct($categories, $services, $products)
    {
        $this->categories = $categories;
        $this->services = $services;
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lead-register-form');
    }
}
