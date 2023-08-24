<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;

class TestingComponent extends Component
{

    public $companyName;
    public $companyURL;
    public $contactNumber;
    public $companyDescription;
    public $companyKeywords;
    public $companyEmail;
    public $message;
    public function mount()
    {
        $setting = Setting::find(1);
        $this->companyName = $setting->company_name;
        $this->companyURL = $setting->company_url;
        $this->contactNumber = $setting->company_contact_phone;
        $this->companyDescription = $setting->company_description;
        $this->companyKeywords = $setting->company_keywords;
        $this->companyEmail = $setting->company_contact_email;
    }

    public function updateCompanyDetails()
    {
        $setting = Setting::find(1);
        $setting->company_name = $this->companyName;
        $setting->company_url = $this->companyURL;
        $setting->company_contact_phone = $this->contactNumber;
        $setting->company_description = $this->companyDescription;
        $setting->company_keywords = $this->companyKeywords;
        $setting->company_contact_email = $this->companyEmail;
        $setting->save();

        $this->message = 'Updated Successfully';
        $this->dispatchBrowserEvent('reset-message', ['delay' => 5000]);
    }
    public function resetMessage()
    {
        $this->message = '';
    }
    public function render()
    {
        return view('livewire.testing-component');
    }
}
