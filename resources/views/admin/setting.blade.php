@extends('admin.template.header')
@can('edit.settings')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


        <?php
    function form_text($setting, $name, $title, $type='text', $variables=''){
?>

        <div class="form-group col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
                </div>
                <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" {{ $variables }}
                    class="form-control form-control-lg" value="{{ old($name, $setting->$name) }}">
            </div>
        </div>

        <?php
    }

    function form_select($setting,$name, $title, $options, $variables=''){
?>
        <div class="form-group col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
                </div>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control form-control-lg">

                    <?php foreach ($options as $key => $value): ?>
                    <option <?php if ($setting->$name == $key) {
                        echo 'selected';
                    } ?> value="<?= $value ?>"><?= $key ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <?php
}

function form_textarea($setting, $name, $title,  $variables=''){
?>
        <div class="form-group col-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text">{{ $title }}</span>
                </div>
                <textarea id="{{ $name }}" name="{{ $name }}" class="form-control form-control-lg"
                    {{ $variables }} value="{{ old($name) }}">{{ $setting->$name }}</textarea>
            </div>
        </div>
        <?php } ?>

        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4>Site Settings</h4>
                            <h6 class="font-weight-light">Settings</h6>
@livewire('testing-component')
                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ol>
                            <form action="{{ route('settings_save') }}" method="POST" class="form-validation pt-3"
                                id="registration-form" enctype="multipart/form-data">
                                @csrf<div class="row">



                                    <label for="">Company Logo</label>
                                    <a href="{{ asset($setting->company_logo) }}" target="_blank">
                                        <img src="{{ asset($setting->company_logo) }}" style="width: 100px" />
                                    </a>
                                    {{ form_text($setting, 'company_logo', 'Company Logo', 'file') }}



                                    <label for="">Company Letter Head</label>
                                    <a href="{{ asset($setting->letter_head) }}" target="_blank">
                                        <img src="{{ asset($setting->letter_head) }}" style="width: 100px" />
                                    </a>
                                    {{ form_text($setting, 'letter_head', 'Letter Head', 'file') }}
                                    {{-- <div id="servicesContainer">
                                        <div class="service-row">
                                            <select name="services[]" class="service-select">
                                                <!-- Your initial select options here -->
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                            <button class="add-service">+</button>
                                        </div>
                                    </div>
                                    <script>
                                        // Get the container element
                                        const servicesContainer = document.getElementById("servicesContainer");

                                        // Attach event listener to the container to handle clicks on the "+" buttons
                                        servicesContainer.addEventListener("click", function(event) {
                                            if (event.target.classList.contains("add-service")) {
                                                // Prevent the default behavior of the button (e.g., form submission)
                                                event.preventDefault();

                                                // Create a new service row
                                                const serviceRow = document.createElement("div");
                                                serviceRow.classList.add("service-row");

                                                // Create the select element
                                                const selectElement = document.createElement("select");
                                                selectElement.name = "services[]";
                                                selectElement.classList.add("service-select");

                                                // Add your select options here
                                                const option1 = document.createElement("option");
                                                option1.value = "option1";
                                                option1.textContent = "Option 1";
                                                selectElement.appendChild(option1);

                                                const option2 = document.createElement("option");
                                                option2.value = "option2";
                                                option2.textContent = "Option 2";
                                                selectElement.appendChild(option2);

                                                const option3 = document.createElement("option");
                                                option3.value = "option3";
                                                option3.textContent = "Option 3";
                                                selectElement.appendChild(option3);

                                                // Create the "+" button
                                                const addButton = document.createElement("button");
                                                addButton.classList.add("add-service");
                                                addButton.textContent = "+";

                                                // Append the select element and "+" button to the service row
                                                serviceRow.appendChild(selectElement);
                                                serviceRow.appendChild(addButton);

                                                // Append the service row to the services container
                                                servicesContainer.appendChild(serviceRow);
                                            }
                                        });
                                    </script> --}}

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
                                                value="{{ old('cost') }}" disabled>
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
