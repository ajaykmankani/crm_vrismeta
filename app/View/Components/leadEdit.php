<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class leadEdit extends Component
{
    /**
     * Create a new component instance.
     */
    public $lead;
    public $categories;
    public $services;
    public $products;
    public function __construct($lead, $categories, $services, $products)
    {
        $this->lead = $lead;
        $this->categories = $categories;
        $this->services = $services;
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lead-edit-form');
    }
}
