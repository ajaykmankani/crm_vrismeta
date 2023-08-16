<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Mail\OfferLetter;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use App\Events\LogActivity;
use App\Models\Setting;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.employee.employee_register');
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
    public function store(StoreEmployeeRequest $request)
    {
        $setting = Setting::where('id', 1)->first();
        $letter_head = $setting->letter_head;
        $pdfName = $request->email . '_' . $request->name . '_' . time() . '.pdf' .
            $employee = new Employee;
        $employee->date = date("Y-m-d");
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->alt_phone = $request->alt_phone;
        $employee->email = $request->email;
        $employee->curr_address = $request->curr_address;
        $employee->per_address = $request->per_address;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->education = $request->education;
        $employee->employment_status = $request->employment_status;
        $employee->last_organization = $request->last_organization;
        $employee->total_experience = $request->total_experience;
        $employee->date_of_joining = $request->date_of_joining;
        $employee->monthly_salary = $request->monthly_salary;
        $employee->cab_facility = $request->cab_facility;
        $employee->designation = $request->designation;
        $employee->source = $request->source;
        $employee->offer_letter = $pdfName;

        // generate pdf
        $view = view('admin.employee.emails.offer_letter_pdf', [
            'date' => date("Y-m-d"),
            'username' => $request->name,
            'salary' => $request->monthly_salary,
            'designation' => $request->designation,
            'address' => $request->curr_address,
            'pdfName' => $pdfName,
            'letter_head' => $letter_head,
        ]);

        $htmlContent = $view->render();

        $dompdf = new Dompdf(['isRemoteEnabled' => true]);
        $dompdf->loadHtml($htmlContent);
        $dompdf->render();

        $pdfContents = $dompdf->output();

        // Save the PDF in the offer_letters folder
        $fileName = $pdfName;
        $filePath = public_path('offer_letters/' . $fileName);
        file_put_contents($filePath, $pdfContents);
        if ($employee->save()) {
            Mail::to($request->email)->send(new OfferLetter(date("Y-m-d"), $request->name, $request->monthly_salary, $request->designation, $request->curr_address, $pdfName, $pdfContents));
            return redirect()->route('employee_list');
        } else {
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee = Employee::orderBy('created_at', 'desc')->where('archive', 0)->get();
        return view('admin.employee.employee_list', ['employees' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $employee_id = $request->employee_id;
        $employee = Employee::find($employee_id);
        return view('admin.employee.employee_edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request)
    {
        $employee_id = $request->employee_id;


        $employee = Employee::find($employee_id);

        $employee->date = $request->date;

        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->alt_phone = $request->alt_phone;
        $employee->email = $request->email;
        $employee->curr_address = $request->curr_address;
        $employee->per_address = $request->per_address;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->education = $request->education;
        $employee->employment_status = $request->employment_status;
        $employee->last_organization = $request->last_organization;
        $employee->total_experience = $request->total_experience;
        $employee->date_of_joining = $request->date_of_joining;
        $employee->monthly_salary = $request->monthly_salary;
        $employee->cab_facility = $request->cab_facility;
        $employee->designation = $request->designation;
        $employee->source = $request->source;

        $employee->save();

        return redirect(route('employee_list'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $employee_id = $request->employee_id;
        $employee = Employee::find($employee_id);

        if ($employee) {
            $employee->delete();
            return redirect()->back()->with('success', 'Employee deleted.');
        }

        return redirect()->back()->with('error', 'Employee not found.');
    }

    public function download_csv()
    {
        $tableData = DB::table('employees')->get();
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
