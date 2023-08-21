<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lead; // Assuming Lead model is in lead_database connection
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SearchBar extends Component
{
    public $query = '';
    public $searchResults = [];
    public function render()
    {
        return view('livewire.search-bar');
    }

    public function updatedQuery()
    {
        $this->searchResults = [];

        // Search in lead_database
        $leadResults = Lead::where(function ($query) {
            $query->where('unique_id', 'like', '%' . $this->query . '%')
                ->orWhere('f_name', 'like', '%' . $this->query . '%')
                ->orWhere('m_name', 'like', '%' . $this->query . '%')
                ->orWhere('l_name', 'like', '%' . $this->query . '%')
                ->orWhere('phone', 'like', '%' . $this->query . '%')
                ->orWhere('alt_phone', 'like', '%' . $this->query . '%')
                ->orWhere('email', 'like', '%' . $this->query . '%');
        })
            ->get()
            ->map(function ($lead) {
                $lead['type'] = 'lead';
                return $lead;
            });

        // Search in sale_database
        $saleResults = Sale::where(function ($query) {
            $query->where('unique_id', 'like', '%' . $this->query . '%')
                ->orWhere('f_name', 'like', '%' . $this->query . '%')
                ->orWhere('m_name', 'like', '%' . $this->query . '%')
                ->orWhere('l_name', 'like', '%' . $this->query . '%')
                ->orWhere('phone', 'like', '%' . $this->query . '%')
                ->orWhere('alt_phone', 'like', '%' . $this->query . '%')
                ->orWhere('email', 'like', '%' . $this->query . '%');
        })
            ->get()
            ->map(function ($sale) {
                $sale['type'] = 'sale';
                return $sale;
            });

        // Merge the search results
        $this->searchResults = array_merge($leadResults->toArray(), $saleResults->toArray());
    }

    public function edit($type, $id)
    {
        if ($type === 'lead') {
            // Redirect to the lead_edit_2 route
            return redirect()->route('lead_edit_2', ['id' => $id]);
        } elseif ($type === 'sale') {
            // Redirect to the sale_edit_2 route
            return redirect()->route('sale_edit_2', ['id' => $id]);
        }
    }
}

