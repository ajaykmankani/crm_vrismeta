@extends('admin.template.header')
@can('employee.create')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


        <?php
    function form_text($name, $title, $type='text', $variables=''){
    ?>

        <div class="form-group col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
                </div>
                <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" {{ $variables }}
                    class="form-control form-control-lg" required autocomplete="none" value="{{ old($name) }}">
            </div>
        </div>

        <?php
    }

    function form_select($name, $title, $options, $variables=''){
?>
        <div class="form-group col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
                </div>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control form-control-lg" required>
                    <option selected disabled>{{ $title }}</option>
                    <?php foreach ($options as $key => $value): ?>
                    <option value="<?= $value ?>"><?= $key ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php
}

function form_textarea($name, $title,  $variables=''){
?>
        <div class="form-group col-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text">{{ $title }}</span>
                </div>
                <textarea id="{{ $name }}" name="{{ $name }}" class="form-control form-control-lg"
                    {{ $variables }} value="{{ old($name) }}"></textarea>
            </div>
        </div>
        <?php } ?>

        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4>Create Employee</h4>
                            <h6 class="font-weight-light">Create New Employee</h6>
                            <form action="{{ route('upload_employee') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="form-control" name="file" accept=".csv">
                                <button type="submit" class="form-control">Upload</button>
                            </form>
                            <p>Sample file: <a href="{{ asset('csv/employee_detail.csv') }}">Download</a></p>
                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ol>
                            <form action="{{ route('create_employee') }}" method="POST" class="form-validation pt-3"
                                id="registration-form">
                                @csrf<div class="row">


                                    {{ form_text('name', 'Employee Name') }}
                                    {{ form_text('email', 'Email') }}
                                    {{ form_text('phone', 'Phone Number', 'text', 'pattern=^\d{10}$ maxlength=10') }}
                                    {{ form_text('alt_phone', 'Alternate Number', 'text', 'pattern=^\d{10}$ maxlength=10') }}

                                    {{ form_text('curr_address', 'Current Address') }}
                                    {{ form_text('per_address', 'Permanent Address') }}
                                    {{ form_text('date_of_birth', 'Date Of Birth', 'date') }}
                                    {{ form_text('education', 'Education Qualification') }}
                                    {{ form_select('employment_status', 'Employment Status', [
                                        'Fresher' => 'fresher',
                                        'Experienced' => 'experienced',
                                    ]) }}

                                    {{ form_text('last_organization', 'Last Organisation Name') }}
                                    {{ form_text('total_experience', 'Total Experiance', 'number') }}
                                    {{ form_text('date_of_joining', 'Date of Joining', 'date') }}
                                    {{ form_text('monthly_salary', 'Monthly Salary') }}
                                    {{ form_select('cab_facility', 'Cab Facility', [
                                        'Yes' => 'yes',
                                        'No' => 'no',
                                    ]) }}

                                    {{ form_text('designation', 'Designation') }}
                                    {{ form_text('source', 'Source') }}

                                    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">







                                </div>
                                <div class="col-12">

                                    <button type="submit" class="bg-primary rounded text-white border-0 p-2">Submit</button>
                                </div>

                                <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partia
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    l:partials/_footer.html -->

        <button style="position: fixed; bottom:50%; right:0px" type="button" class="btn btn-primary btn-sm" data-toggle="modal"
            data-target="#exampleModal">
            <i class="bi bi-calculator-fill"></i>
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Calculator</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <form>

                                    <div class="form-group col-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span style="color:black" class="input-group-text"
                                                    id="basic-addon3">Calculate</span>
                                            </div>
                                            <input type="text" id="calculation"
                                                placeholder="Enter a calculation (e.g., 1 + 1 / 1 * 1)"
                                                class="form-control form-control-lg" required autocomplete="none"
                                                value="{{ old('calculation') }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="input-group mb-3">
                                            <button class="btn btn-primary w-100 p-2" type="button"
                                                onclick="calculate()">Calculate</button>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span style="color:black" class="input-group-text"
                                                    id="basic-addon3">Total</span>
                                            </div>
                                            <input type="number" id="cost" name="cost"
                                                class="form-control form-control-lg" required autocomplete="none"
                                                value="{{ old('cost') }}">
                                        </div>
                                    </div>
                                </form>

                                <script>
                                    function calculate() {
                                        const calculationInput = document.getElementById('calculation');
                                        const costInput = document.getElementById('cost');

                                        // Get the calculation expression from the input field
                                        const expression = calculationInput.value;

                                        try {
                                            // Evaluate the expression using JavaScript's eval() function
                                            const result = eval(expression);

                                            // Check if the result is a valid number
                                            if (typeof result === 'number' && isFinite(result)) {
                                                // Update the "cost" input field with the calculated result
                                                costInput.value = result;
                                            } else {
                                                // Display an error message if the result is not a valid number
                                                costInput.value = 'Error';
                                            }
                                        } catch (error) {
                                            // Display an error message if an exception occurred during evaluation
                                            costInput.value = 'Error';
                                        }
                                    }
                                </script>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    @endsection
@endcan
