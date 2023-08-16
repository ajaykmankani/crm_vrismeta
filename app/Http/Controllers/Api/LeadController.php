<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreLeadRequest $request)
    {
        $lead = new Lead;
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->service = $request->service;
        $lead->lead_status = $request->lead_status;
        $lead->notes = $request->notes;
        $lead->save();


        return response()->json([
            'status' => 'success',
            'data' => 'Lead Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        $leads = Lead::all()->where('archive', 0);
        return json_encode($leads);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        $lead = Lead::find($lead);
        if ($lead == "") {
            return redirect('leads');
        } else {


            $lead->name = $request->name;
            $lead->phone = $request->phone;
            $lead->email = $request->email;
            $lead->service = $request->service;
            $lead->lead_status = $request->lead_status;
            $lead->notes = $request->notes;
            $lead->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
