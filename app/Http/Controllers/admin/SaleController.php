<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Events\LogActivity;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.sale.sale_register');
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
    public function store(StoreSaleRequest $request)
    {

        $sale = new Sale;
        $sale->date = date("Y-m-d");;
        $sale->first_name = $request->first_name;
        $sale->last_name = $request->last_name;
        $sale->account_number = $request->account_number;
        $sale->phone = $request->phone;
        $sale->email = $request->email;
        $sale->package = $request->package;
        $sale->status = $request->status;
        $sale->address = $request->address;
        $sale->current_service_provider = $request->current_service_provider;
        $sale->service = $request->service;
        $sale->issue = $request->issue;
        $sale->we_offer = $request->we_offer;
        $sale->order_number = $request->order_number;
        $sale->order_confirmation_number = $request->order_confirmation_number;
        $sale->reference_number = $request->reference_number;
        $sale->monthly_bill = $request->monthly_bill;
        $sale->technician_date_and_time = $request->technician_date_and_time;
        $sale->one_time_fee = $request->one_time_fee;
        $sale->security_passcode = $request->security_passcode;
        $sale->security_question = $request->security_question;
        $sale->security_answer = $request->security_answer;
        $sale->comments = $request->comments;
        $sale->credit_check = $request->credit_check;
        $sale->mode_of_cc = $request->mode_of_cc;
        $sale->mode_of_payment = $request->mode_of_payment;
        $sale->toll_free_number = $request->toll_free_number;
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
    }

    /**
     * Display the specified resource.
     */
    public function show(sale $sale)
    {
        $categories = ProductCategory::all()->pluck('category_name','id');
        $sales = sale::orderBy('created_at', 'desc')->where('archive', 0)->get();
        return view('admin.sale.sale_list', compact( 'sales','categories'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $products = Product::all();
        $services = Service::all();
        $categories = ProductCategory::all();
        $sale_id = $request->sale_id;
        $sale = sale::find($sale_id);
        return view('admin.sale.sale_edit', compact('sale','products','services','categories'));
    }

    public function edit_2($id)
    {
        $products = Product::all();
        $services = Service::all();
        $categories = ProductCategory::all();
        $sale_id = $id;
        $sale = sale::find($sale_id);
        return view('admin.sale.sale_edit', compact('sale', 'products', 'services', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $sale_id = $request->sale_id;
        $sale = Sale::find($sale_id);






        $sale->unique_id = $request->unique_id;
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
        $sale->mode_of_cc = $request->mode_of_cc;
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
        $sale->card_number = $request->card_number;
        $sale->cvv = $request->cvv;
        $sale->expiry = $request->expiry;
        $sale->agent_name = $request->agent_name;

        $sale->save();
        $user = auth()->user();
        $activity = "Sale " . $request->first_name . '' . $request->last_name . " edited successfully.";
        event(new LogActivity($user, $activity));
        return redirect(route('sale_list'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $sale_id = $request->sale_id;
        $sale = sale::find($sale_id);

        if ($sale) {
            $sale->delete();
            $user = auth()->user();
            $activity = "Sale " . $request->sale_id . " deleted successfully.";
            event(new LogActivity($user, $activity));
            return redirect()->back()->with('success', 'sale deleted successfully.');
        }

        return redirect()->back()->with('error', 'sale not found.');
    }

    public function destroy_multiple(Request $request)
    {

        foreach ($request->sales as $sale_id) {

            $sale = sale::find($sale_id);

            if ($sale) {
                $sale->delete();
                $user = auth()->user();
                $activity = "Sale " . $request->sale_id . " deleted successfully.";
                event(new LogActivity($user, $activity));
            }
        }
        return redirect()->back()->with('success', 'Sale deleted.');
    }


    public function download_csv()
    {
        $tableData = DB::table('sales')->get();
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
        $activity = "Sales Report Downloaded successfully.";
        event(new LogActivity($user, $activity));
        return Response::stream($callback, 200, $headers);
    }
}
