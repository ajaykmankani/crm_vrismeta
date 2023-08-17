<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class credit_check_info_edit extends Component
{
    /**
     * Create a new component instance.
     */
    public $lead;
    public function __construct($lead,)
    {
        $this->lead = $lead;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.credit_check_info_edit');
    }
}
