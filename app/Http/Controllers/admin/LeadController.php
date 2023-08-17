<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Events\LogActivity;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Sale;
use App\Models\Service;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = ProductCategory::all();
        $services = Service::all();
        return view('admin.lead.lead_register', compact('products', 'categories', 'services'));
    }

    public function frontend_lead()
    {
        return view('frontend.index');
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

    public function frontend_store(StoreLeadRequest $request)
    {

        $lead = new Lead;
        $lead->date = $request->date;
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->alt_phone = $request->alt_phone;
        $lead->email = $request->email;
        $lead->address = $request->address;
        $lead->apt = $request->apt;
        $lead->zip_code = $request->zip_code;
        $lead->current_service_provider = $request->current_service_provider;
        $lead->current_service = $request->current_service;
        $lead->current_issue = $request->current_issue;
        $lead->we_offer = $request->we_offer;
        $lead->comment = $request->comment;
        $lead->call_dispose = $request->call_dispose;
        $lead->agent_name = $request->agent_name;
        $lead->user_name = $request->user_name;
        if ($lead->save()) {

            return redirect()->route('thankyou');
        } else {
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }


    public function store(StoreLeadRequest $request)
    {

        $request->validated([
            'call_dispose' => 'required',
        ]);

        if ($request->card_number != null) {
            $sale = new Sale;
            $sale->date = date("Y-m-d");
            $sale->f_name = $request->f_name;
            $sale->m_name = $request->m_name;
            $sale->l_name = $request->l_name;
            $sale->phone = $request->phone;
            $sale->alt_phone = $request->alt_phone;
            $sale->email = $request->email;
            $sale->address_1 = $request->address_1;
            $sale->address_2 = $request->address_2;
            $sale->city = $request->city;
            $sale->state = $request->state;
            $sale->zip_code = $request->zip_code;
            $sale->current_service_provider = $request->current_service_provider;
            $sale->current_service = $request->current_service;
            $sale->current_issue = $request->current_issue;
            $sale->call_dispose = $request->call_dispose;
            $sale->order_number = $request->order_number;
            $sale->driving_license_number = $request->driving_license_number;
            $sale->licanse_expiry_date = $request->licanse_expiry_date;
            $sale->verification_mode = $request->verification_mode;
            $sale->driving_license_issuing_state = $request->driving_license_issuing_state;
            $sale->state_id_number = $request->state_id_number;
            $sale->state_id_expiry_date = $request->state_id_expiry_date;
            $sale->state_id_issuing_state = $request->state_id_issuing_state;
            $sale->tax_id_number = $request->tax_id_number;
            $sale->tax_id_expiry_date = $request->tax_id_expiry_date;
            $sale->tax_id_issuing_state = $request->tax_id_issuing_state;
            $sale->social_security_number = $request->social_security_number;
            $sale->comment = $request->comment;
            $sale->product = http_build_query($request->product, '', ', ');
            $sale->service = http_build_query($request->service, '', ', ');
            $sale->order_confirmation_number = $request->order_confirmation_number;
            $sale->reference_number = $request->reference_number;
            $sale->monthly_bill = $request->monthly_bill;
            $sale->technician_date_and_time = $request->technician_date_and_time;
            $sale->one_time_fee = $request->one_time_fee;
            $sale->security_passcode = $request->security_passcode;
            $sale->security_question = $request->security_question;
            $sale->security_answer = $request->security_answer;
            $sale->credit_check = $request->credit_check;
            $sale->mode_of_cc = $request->mode_of_cc;
            $sale->mode_of_payment = $request->mode_of_payment;
            $sale->toll_free_number = $request->toll_free_number;
            $sale->dob = $request->dob;
            $sale->ssn = $request->ssn;
            $sale->card_number = $request->card_number;
            $sale->cvv = $request->cvv;
            $sale->xp = $request->xp;
            $sale->agent_name = $request->agent_name;
            $sale->user_name = Auth::user()->name;
            if ($sale->save()) {
                $user = auth()->user();
                $activity = "Sale " . $request->first_name . '' . $request->last_name . " registered successfully.";
                event(new LogActivity($user, $activity));
                return redirect()->route('sale_list');
            } else {
                return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
            }
        } else {


            $lead = new Lead;
            $lead->date = date("Y-m-d");
            $lead->f_name = $request->f_name;
            $lead->m_name = $request->m_name;
            $lead->l_name = $request->l_name;
            $lead->phone = $request->phone;
            $lead->alt_phone = $request->alt_phone;
            $lead->email = $request->email;
            $lead->address_1 = $request->address_1;
            $lead->address_2 = $request->address_2;
            $lead->city = $request->city;
            $lead->state = $request->state;
            $lead->zip_code = $request->zip_code;
            $lead->current_service_provider = $request->current_service_provider;
            $lead->current_service = $request->current_service;
            $lead->current_issue = $request->current_issue;
            $lead->call_dispose = $request->call_dispose;
            $lead->security_passcode = $request->security_passcode;
            $lead->security_question = $request->security_question;
            $lead->security_answer = $request->security_answer;
            $lead->product = http_build_query($request->product, '', ', ');
            $lead->service = http_build_query($request->service, '', ', ');
            $lead->comment = $request->comment;
            $lead->verification_mode = $request->verification_mode;
            $lead->driving_license_number = $request->driving_license_number;
            $lead->licanse_expiry_date = $request->licanse_expiry_date;
            $lead->driving_license_issuing_state = $request->driving_license_issuing_state;
            $lead->state_id_number = $request->state_id_number;
            $lead->state_id_expiry_date = $request->state_id_expiry_date;
            $lead->state_id_issuing_state = $request->state_id_issuing_state;
            $lead->tax_id_number = $request->tax_id_number;
            $lead->tax_id_expiry_date = $request->tax_id_expiry_date;
            $lead->tax_id_issuing_state = $request->tax_id_issuing_state;
            $lead->social_security_number = $request->social_security_number;
            $lead->agent_name = $request->agent_name;
            $lead->user_name = Auth::user()->name;
            if ($lead->save()) {
                $user = auth()->user();
                $activity = "lead " . $request->name . " registered.";
                event(new LogActivity($user, $activity));
                return redirect()->route('lead_list')->with('success', 'Lead Saved Successfully');
            } else {
                return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        $leads = Lead::orderBy('created_at', 'desc')->where('archive', 0)->get();
        return view('admin.lead.lead_list', ['leads' => $leads]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $products = Product::all();
        $services = Service::all();
        $categories = ProductCategory::all();
        $lead_id = $request->lead_id;
        $lead = Lead::find($lead_id);
        return view('admin.lead.lead_edit', compact('lead', 'products', 'services', 'categories'));
    }


    public function edit_2($id)
    {
        $products = Product::all();
        $services = Service::all();
        $categories = ProductCategory::all();
        $lead_id = $id;
        $lead = Lead::find($lead_id);
        return view('admin.lead.lead_edit', compact('lead', 'products', 'services', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {


        if ($request->card_number != null) {
            $sale = new Sale;
            $sale->date = date("Y-m-d");
            $sale->f_name = $request->f_name;
            $sale->m_name = $request->m_name;
            $sale->l_name = $request->l_name;
            $sale->phone = $request->phone;
            $sale->alt_phone = $request->alt_phone;
            $sale->email = $request->email;
            $sale->address_1 = $request->address_1;
            $sale->address_2 = $request->address_2;
            $sale->city = $request->city;
            $sale->state = $request->state;
            $sale->zip_code = $request->zip_code;
            $sale->current_service_provider = $request->current_service_provider;
            $sale->current_service = $request->current_service;
            $sale->current_issue = $request->current_issue;
            $sale->call_dispose = $request->call_dispose;
            $sale->order_number = $request->order_number;
            $sale->comment = $request->comment;
            $sale->verification_mode = $request->verification_mode;
            $sale->driving_license_number = $request->driving_license_number;
            $sale->licanse_expiry_date = $request->licanse_expiry_date;
            $sale->driving_license_issuing_state = $request->driving_license_issuing_state;
            $sale->state_id_number = $request->state_id_number;
            $sale->state_id_expiry_date = $request->state_id_expiry_date;
            $sale->state_id_issuing_state = $request->state_id_issuing_state;
            $sale->tax_id_number = $request->tax_id_number;
            $sale->tax_id_expiry_date = $request->tax_id_expiry_date;
            $sale->tax_id_issuing_state = $request->tax_id_issuing_state;
            $sale->social_security_number = $request->social_security_number;
            $sale->product = http_build_query($request->product, '', ', ');
            $sale->service = http_build_query($request->service, '', ', ');
            $sale->order_confirmation_number = $request->order_confirmation_number;
            $sale->reference_number = $request->reference_number;
            $sale->monthly_bill = $request->monthly_bill;
            $sale->technician_date_and_time = $request->technician_date_and_time;
            $sale->one_time_fee = $request->one_time_fee;
            $sale->security_passcode = $request->security_passcode;
            $sale->security_question = $request->security_question;
            $sale->credit_check = $request->credit_check;
            $sale->mode_of_cc = $request->mode_of_cc;
            $sale->mode_of_payment = $request->mode_of_payment;
            $sale->toll_free_number = $request->toll_free_number;
            $sale->dob = $request->dob;
            $sale->ssn = $request->ssn;
            $sale->card_number = $request->card_number;
            $sale->cvv = $request->cvv;
            $sale->xp = $request->xp;
            $sale->agent_name = $request->agent_name;
            $sale->user_name = Auth::user()->name;
            if ($sale->save()) {
                $user = auth()->user();
                $activity = "Sale " . $request->first_name . '' . $request->last_name . " registered successfully.";
                event(new LogActivity($user, $activity));
                $lead_id = $request->lead_id;
                $lead = Lead::find($lead_id);

                if ($lead) {
                    $lead->delete();
                }
                return redirect()->route('sale_list');
            } else {
                return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
            }
        } else {


            $lead_id = $request->lead_id;
            $lead = Lead::find($lead_id);


            $lead->date = $request->date;
            $lead->f_name = $request->f_name;
            $lead->m_name = $request->m_name;
            $lead->l_name = $request->l_name;
            $lead->phone = $request->phone;
            $lead->alt_phone = $request->alt_phone;
            $lead->email = $request->email;
            $lead->address_1 = $request->address_1;
            $lead->address_2 = $request->address_2;
            $lead->city = $request->city;
            $lead->state = $request->state;
            $lead->zip_code = $request->zip_code;
            $lead->current_service_provider = $request->current_service_provider;
            $lead->current_service = $request->current_service;
            $lead->current_issue = $request->current_issue;
            $lead->call_dispose = $request->call_dispose;
            $lead->security_passcode = $request->security_passcode;
            $lead->security_question = $request->security_question;
            $lead->security_answer = $request->security_answer;
            $lead->product = http_build_query($request->product, '', ', ');
            $lead->service = http_build_query($request->service, '', ', ');
            $lead->comment = $request->comment;
            $lead->verification_mode = $request->verification_mode;
            $lead->driving_license_number = $request->driving_license_number;
            $lead->licanse_expiry_date = $request->licanse_expiry_date;
            $lead->driving_license_issuing_state = $request->driving_license_issuing_state;
            $lead->state_id_number = $request->state_id_number;
            $lead->state_id_expiry_date = $request->state_id_expiry_date;
            $lead->state_id_issuing_state = $request->state_id_issuing_state;
            $lead->tax_id_number = $request->tax_id_number;
            $lead->tax_id_expiry_date = $request->tax_id_expiry_date;
            $lead->tax_id_issuing_state = $request->tax_id_issuing_state;
            $lead->social_security_number = $request->social_security_number;
            $lead->agent_name = $request->agent_name;

            $lead->save();
            $user = auth()->user();
            $activity = "lead " . $request->name . " updated.";
            event(new LogActivity($user, $activity));
            return redirect(route('lead_list'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $lead_id = $request->lead_id;
        $lead = Lead::find($lead_id);

        if ($lead) {
            $lead->delete();
            return redirect()->back()->with('success', 'Lead deleted.');
        }
        $user = auth()->user();
        $activity = "lead " . $request->first_name . '' . $request->last_name . " deleted.";
        event(new LogActivity($user, $activity));
        return redirect()->back()->with('error', 'Lead not found.');
    }

    public function destroy_multiple(Request $request)
    {

        foreach ($request->leads as $lead_id) {

            $lead = Lead::find($lead_id);

            if ($lead) {
                $lead->delete();
                $user = auth()->user();
                $activity = "lead " . $request->first_name . '' . $request->last_name . " deleted.";
                event(new LogActivity($user, $activity));
            }
        }
        return redirect()->back()->with('success', 'Lead deleted.');
    }


    public function download_csv()
    {
        $tableData = DB::table('leads')->get();
        $filename = 'table_data_' . Carbon::now()->format('Ymd_His') . '.csv';
        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $filename,
        ];

        $callback = function () use ($tableData) {
            $file = fopen('php://output', 'w');
            $columns = array_keys((array)$tableData->first());

            fputcsv($file, $columns);

            foreach ($tableData as $row) {
                fputcsv($file, (array)$row);
            }

            fclose($file);
        };
        $user = auth()->user();
        $activity = "Report generated and downloaded.";
        event(new LogActivity($user, $activity));
        return Response::stream($callback, 200, $headers);
    }
}
