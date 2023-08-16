<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::where('id', 1)->first();

        return view('admin.setting', ['setting' => $setting]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request)
    {



        $setting = Setting::where('id', 1)->first();
        $setting->company_name = $request->company_name;


        if ($request->hasFile('company_logo')) {

            $company_logo = 'logo' . time() . '.' . $request->company_logo->extension();
            $request->company_logo->move(public_path('uploads'), $company_logo);
            $logo_light_path = 'uploads/' . $company_logo;
            $setting->company_logo = $logo_light_path;
        }

        if ($request->hasFile('letter_head')) {
            $letter_head = 'letter_head' . time() . '.' . $request->letter_head->extension();
            $request->letter_head->move(public_path('uploads'), $letter_head);
            $letter_head_path = 'uploads/' . $letter_head;
            $setting->letter_head = $letter_head_path;
        }

        $setting->company_url = $request->company_url;
        $setting->company_description = $request->company_description;
        $setting->company_keywords = $request->company_keywords;
        $setting->company_contact_email = $request->company_contact_email;
        $setting->company_contact_phone = $request->company_contact_phone;
        $setting->company_contact_url = $request->company_contact_url;
        $companyName = $request->company_name;
        // Set the APP_NAME environment variable to the company_name
        // Set the APP_NAME environment variable dynamically
        putenv("APP_NAME={$companyName}");

        // Clear the application cache
        Artisan::call('cache:clear');
        if ($setting->save()) {

            return back()->with('flash_message', 'Setting added!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}