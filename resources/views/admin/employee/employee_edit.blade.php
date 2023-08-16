@extends('admin.template.header')
@can('employee.update')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


        <?php



    function form_text($employee,$name, $title, $type='text', $variables=''){

?>

        <div class="form-group col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
                </div>
                <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" {{ $variables }}
                    class="form-control form-control-lg" required autocomplete="none"
                    value="{{ old($name, $employee->$name) }}">
            </div>
        </div>

        <?php
    }

    function form_select($employee,$name, $title, $options, $variables=''){
?>
        <div class="form-group col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
                </div>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control form-control-lg" required>

                    <?php foreach ($options as $key => $value): ?>
                    <option <?php if ($employee->$name == $key) {
                        echo 'selected';
                    } ?> value="<?= $value ?>"><?= $key ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <?php
}

function form_textarea($employee, $name, $title,  $variables=''){
?>
        <div class="form-group col-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text">{{ $title }}</span>
                </div>
                <textarea id="{{ $name }}" name="{{ $name }}" class="form-control form-control-lg"
                    {{ $variables }}>{{ old($name, $employee->$name) }}</textarea>
            </div>
        </div>
        <?php } ?>

        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4>Edit Employee</h4>
                            <h6 class="font-weight-light">Edit This Employee</h6>

                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <div id="alert-message" class="alert-message text-danger fw-bold my-2">
                                            {{ $error }}</div>
                                    </li>
                                @endforeach
                            </ol>
                            <form action="{{ route('employee_update') }}" method="POST" class="form-validation pt-3"
                                id="registration-form">
                                @csrf
                                <div class="row">
                                    <input type="hidden" value="{{ $employee->id }}" name="employee_id">
                                    {{ form_text($employee, 'date', 'Date', 'date') }}

                                    {{ form_text($employee, 'name', 'Employee Name') }}
                                    {{ form_text($employee, 'email', 'Email') }}
                                    {{ form_text($employee, 'phone', 'Phone Number', 'text', 'pattern=^\d{10}$ maxlength=10') }}
                                    {{ form_text($employee, 'alt_phone', 'Alternate Number', 'text', 'pattern=^\d{10}$ maxlength=10') }}

                                    {{ form_text($employee, 'curr_address', 'Current Address') }}
                                    {{ form_text($employee, 'per_address', 'Permanent Address') }}
                                    {{ form_text($employee, 'date_of_birth', 'Date Of Birth', 'date') }}
                                    {{ form_text($employee, 'education', 'Education Qualification') }}
                                    {{ form_select($employee, 'employment_status', 'Employment Status', [
                                        'Fresher' => 'fresher',
                                        'Experienced' => 'experienced',
                                    ]) }}

                                    {{ form_text($employee, 'last_organization', 'Last Organisation Name') }}
                                    {{ form_text($employee, 'total_experience', 'Total Experiance', 'number') }}
                                    {{ form_text($employee, 'date_of_joining', 'Date of Joining', 'date') }}
                                    {{ form_text($employee, 'monthly_salary', 'Monthly Salary') }}
                                    {{ form_select($employee, 'cab_facility', 'Cab Facility', [
                                        'Yes' => 'yes',
                                        'No' => 'no',
                                    ]) }}

                                    {{ form_text($employee, 'designation', 'Designation') }}
                                    {{ form_text($employee, 'source', 'Source') }}

                                </div>
                                <div class="col-12">

                                    <button type="submit" class="bg-primary rounded text-white border-0 p-2">Submit</button>
                                </div>


                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partia
                                                                                                                                                                                                            l:partials/_footer.html -->

        <!-- content-wrapper ends -->
    @endsection
@endcan
