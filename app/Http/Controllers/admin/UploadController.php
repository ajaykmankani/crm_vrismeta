<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function upload_lead(Request $row)
    {
        $row->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if ($row->hasFile('file')) {
            $path = $row->file('file')->getRealPath();
            $data = array_map('str_getcsv', file($path));

            foreach ($data as $index => $row) {
                if ($index === 0) {
                    continue; // Skip the first row
                }
                $lead = new Lead();

                $columns = [
                    'date',
                    'f_name',
                    'm_name',
                    'l_name',
                    'phone',
                    'alt_phone',
                    'email',
                    'address_1',
                    'address_2',
                    'city',
                    'state',
                    'zip_code',
                    'current_service_provider',
                    'current_service',
                    'current_issue',
                    'call_dispose',
                    'security_passcode',
                    'security_question',
                    'security_answer',
                    'comment',
                    'agent_name',
                ];
                foreach ($columns as $key => $value) {
                    $lead->{$value} = $row[$key];
                }
                $lead->user_name = Auth::user()->name;
                $lead->save();
            }

            return redirect()->route('lead_list');
        }

        return redirect()->back()->with('error', 'Please upload a CSV file.');
    }

    public function upload_sale(Request $row)
    {
        $row->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if ($row->hasFile('file')) {
            $path = $row->file('file')->getRealPath();
            $data = array_map('str_getcsv', file($path));

            foreach ($data as $index => $row) {
                if ($index === 0) {
                    continue; // Skip the first row
                }
                $sale = new Sale();

                $columns = [
                    'date',
                    'f_name',
                    'm_name',
                    'l_name',
                    'phone',
                    'alt_phone',
                    'email',
                    'address_1',
                    'address_2',
                    'city',
                    'state',
                    'zip_code',
                    'current_service_provider',
                    'current_service',
                    'current_issue',
                    'call_dispose',
                    'comment',
                    'product',
                    'service',
                    'order_number',
                    'order_confirmation_number',
                    'reference_number',
                    'monthly_bill',
                    'technician_date_and_time',
                    'one_time_fee',
                    'security_passcode',
                    'security_question',
                    'security_answer',
                    'credit_check',
                    'mode_of_cc',
                    'mode_of_payment',
                    'toll_free_number',
                    'dob',
                    'ssn',
                    'card_number',
                    'cvv',
                    'xp',
                    'agent_name',
                ];
                foreach ($columns as $key => $value) {
                    $sale->{$value} = $row[$key];
                }

                $sale->user_name = Auth::user()->name;
                $sale->save();
            }

            return redirect()->route('sale_list');
        }

        return redirect()->back()->with('error', 'Please upload a CSV file.');
    }

    public function upload_employee(Request $row)
    {
        $row->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if ($row->hasFile('file')) {
            $path = $row->file('file')->getRealPath();
            $data = array_map('str_getcsv', file($path));

            foreach ($data as $index => $row) {
                if ($index === 0) {
                    continue; // Skip the first row
                }
                $employee = new Employee();
                $employee->date = $row[0];
                $employee->name = $row[1];
                $employee->phone = $row[2];
                $employee->alt_phone = $row[3];
                $employee->email = $row[4];
                $employee->curr_address = $row[5];
                $employee->per_address = $row[6];
                $employee->date_of_birth = $row[7];
                $employee->education = $row[8];
                $employee->employment_status = $row[9];
                $employee->last_organization = $row[10];
                $employee->total_experience = $row[11];
                $employee->date_of_joining = $row[12];
                $employee->monthly_salary = $row[13];
                $employee->cab_facility = $row[14];
                $employee->designation = $row[15];
                $employee->source = $row[16];

                $employee->save();
            }

            return redirect()->route('employee_list');
        }

        return redirect()->back()->with('error', 'Please upload a CSV file.');
    }
}
