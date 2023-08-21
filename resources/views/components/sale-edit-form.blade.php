<div>
    <form action="{{ route('sale_update') }}" method="POST" class="form-validation pt-3">
        @csrf
        <div class="row">
            <input type="hidden" value="{{ $sale->id }}" name="sale_id">
 <div class=" col-3">
                <div class="input-group">
                    <label class="input-group-text">Unique ID</label>
                    <input readonly type="text" class="form-control" name="unique_id" @if($sale->unique_id) value="{{ $sale->unique_id }}" @else value="{{ Str::random(10) }}" @endif id="">
                </div>
            </div>
            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'f_name', 'First Name'])
            </div>
            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'm_name', 'Middle Name'])
            </div>
            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'l_name', 'Last Name'])
            </div>
            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'phone', 'Phone', 'text', 'pattern=^\d{10}$ maxlength=10'])
            </div>
            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'alt_phone', 'Alt Phone', 'text', 'pattern=^\d{10}$ maxlength=10'])
            </div>
            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'email', 'Email'])
            </div>
            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'address_1', 'Address Line-1'])
            </div>
            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'address_2', 'Address Line-2'])
            </div>
            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'city', 'City'])
            </div>
            <div class="col-3">
                @livewire('select-component-edit', [
                    $sale,
                    'state',
                    'State',
                    [
                        'Alabama' => 'Alabama',
                        'Alaska' => 'Alaska',
                        'Arizona' => 'Arizona',
                        'Arkansas' => 'Arkansas',
                        'California' => 'California',
                        'Colorado' => 'Colorado',
                        'Connecticut' => 'Connecticut',
                        'Delaware' => 'Delaware',
                        'Florida' => 'Florida',
                        'Georgia' => 'Georgia',
                        'Hawaii' => 'Hawaii',
                        'Idaho' => 'Idaho',
                        'Illinois' => 'Illinois',
                        'Indiana' => 'Indiana',
                        'Iowa' => 'Iowa',
                        'Kansas' => 'Kansas',
                        'Kentucky' => 'Kentucky',
                        'Louisiana' => 'Louisiana',
                        'Maine' => 'Maine',
                        'Maryland' => 'Maryland',
                        'Massachusetts' => 'Massachusetts',
                        'Michigan' => 'Michigan',
                        'Minnesota' => 'Minnesota',
                        'Mississippi' => 'Mississippi',
                        'Missouri' => 'Missouri',
                        'Montana' => 'Montana',
                        'Nebraska' => 'Nebraska',
                        'Nevada' => 'Nevada',
                        'New Hampshire' => 'New Hampshire',
                        'New Jersey' => 'New Jersey',
                        'New Mexico' => 'New Mexico',
                        'New York' => 'New York',
                        'North Carolina' => 'North Carolina',
                        'North Dakota' => 'North Dakota',
                        'Ohio' => 'Ohio',
                        'Oklahoma' => 'Oklahoma',
                        'Oregon' => 'Oregon',
                        'Pennsylvania' => 'Pennsylvania',
                        'Rhode Island' => 'Rhode Island',
                        'South Carolina' => 'South Carolina',
                        'South Dakota' => 'South Dakota',
                        'Tennessee' => 'Tennessee',
                        'Texas' => 'Texas',
                        'Utah' => 'Utah',
                        'Vermont' => 'Vermont',
                        'Virginia' => 'Virginia',
                        'Washington' => 'Washington',
                        'West Virginia' => 'West Virginia',
                        'Wisconsin' => 'Wisconsin',
                        'Wyoming' => 'Wyoming',
                    ],
                ])
            </div>


            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'zip_code', 'Zip/Postal Code'])
            </div>
            <div class=" col-3">
                @livewire('select-component-edit', [
                    $sale,
                    'current_service_provider',
                    'Current Service Provider',
                    [
                        'Xfinity' => 'Xfinity',
                        'Comcast' => 'Comcast',
                        'Verizon' => 'Verizon',
                        'Cox communication' => 'Cox communication',
                        'Dish network' => 'Dish network',
                        'Wow' => 'Wow',
                        'AT&T' => 'AT&T',
                        'Frontier' => 'Frontier',
                        'Spectrum' => 'Spectrum',
                        'Windstream' => 'Windstream',
                    ],
                ])
            </div>
            <div class=" col-3">
                @livewire('select-component-edit', [
                    $sale,
                    'current_service',
                    'Current Service',
                    [
                        'Internet' => 'Internet',
                        'TV' => 'TV',
                        'Internet + tv' => 'Internet + tv',
                        'Internet + tv + voice' => 'Internet + tv + voice',
                        'int + tv + voice + security' => 'int + tv + voice + security',
                    ],
                ])
            </div>
            <div class=" col-3">
                @livewire('select-component-edit', [
                    $sale,
                    'current_issue',
                    'Current Issue',
                    [
                        'Technical' => 'Technical',
                        'New Service' => 'New Service',
                        'Billing' => 'Billing',
                    ],
                ])
            </div>


            <div class=" col-3">
                @livewire('select-component-edit', [
                    $sale,
                    'call_dispose',
                    'Call Dispose',
                    [
                        'Active account' => 'Active account',
                        'call back' => 'call back',
                        'Ghost' => 'Ghost',
                        'voice issue' => 'voice issue',
                        'Language barrier' => 'Language barrier',
                        'Repeat call' => 'Repeat call',
                        'Disconnected call' => 'Disconnected call',
                        'Wrong number' => 'Wrong number',
                        'Run Credit Check' => 'Run Credit Check',
                        'Credit Check Done' => 'Credit Check Done',
                        'Run Verification' => 'Run Verification',
                        'Verification Done' => 'Verification Done',
                        'Branding' => 'Branding',
                        'Service Not Available' => 'Service Not Available',
                    ],
                    'onchange=updateFieldsValidation()',
                ])
            </div>

            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'security_passcode', 'Security Passcode'])
            </div>
            <div class=" col-3">
                @livewire('select-component-edit', [
                    $sale,
                    'security_question',
                    'Security Question',
                    [
                        'Who is your favorite singer ?' => 'Who is your favorite singer ?',
                        'Who is your favorite actor ?' => 'Who is your favorite actor ?',
                        'Who is your Childhood hero ?' => 'Who is your Childhood hero ?',
                        'Favorite restaurant ?' => 'Favorite restaurant ?',
                    ],
                ])
            </div>

            <div class=" col-3">
                @livewire('text-component-edit', [$sale, 'security_answer', 'Security Answer'])
            </div>
            <div class="col-3 d-none" id="credit_check_info">
                <x-credit_check_info_edit :lead="$sale" />
            </div>
            <div class=" col-3 d-none" id="pass-fail">
                <b class="me-3">Credit Check Status</b>
                <label class="form-radio-label ">Pass</label>
                <input type="radio" class="me-3" @if ($sale->credit_check == 'pass') checked @endif id="credit_check"
                    name="credit_check" value="pass">
                <label class="form-radio-label ">Fail</label>
                <input type="radio" class="me-3" @if ($sale->credit_check == 'fail') checked @endif id="credit_check"
                    name="credit_check" value="fail">
            </div>



            <div class="col-12 d-none" id="services">
                @php
                    $product_all = explode(', ', $products);
                    $service_all = explode(', ', $services);

                @endphp
                @php
                    $product = explode(', ', $sale->product);
                    $product_count = count($product);
                @endphp
                @foreach ($categories as $category)
                    @php
                        $for = $category->category_name;
                        $categoryId = $category->id;

                    @endphp
                    <x-product_and_services_edit :products="$products" :services="$services" :for="$for" :categoryId="$categoryId"
                        :sale="$sale" />

                    <div class="col-12"></div>
                @endforeach
            </div>
            @livewire('textarea-component-edit', [$sale, 'comment', 'Comment', 'style=height:200px'])











            <style>
                /* Increase the width of the modal */
                .modal-dialog.modal-fullscreen {
                    width: 100vw;
                    /* Adjust this value as needed */
                    max-width: none;
                    /* Remove the default maximum width */
                }

                /* Reduce padding and margin for modal content */
                .modal-content {
                    padding: 15px;
                    margin: 0;
                }
            </style>


            <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen" role="document">
                    <!-- 'modal-fullscreen' class added to make the modal spread across the screen -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Service Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <div class="row">





                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'order_number', 'Order Number'])
                                </div>

                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'order_confirmation_number', 'Order Confirmation Number'])
                                </div>


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'reference_number', 'Reference Number'])
                                </div>


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'monthly_bill', 'Monthly Bill'])
                                </div>


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'technician_date_and_time', 'Technician Date and Time'])
                                </div>


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'one_time_fee', 'One time Fee'])
                                </div>







{{--
                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'credit_check', 'Credit Check'])
                                </div>


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'mode_of_cc', 'Mode of CC'])
                                </div> --}}


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'mode_of_payment', 'Mode of Payment'])
                                </div>


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'toll_free_number', 'Toll Free Number', 'phone'])
                                </div>


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'dob', 'Date of birth', 'date'])
                                </div>


                                {{-- <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'ssn', 'Social Security Number'])
                                </div> --}}


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'card_number', 'Card Number'])
                                </div>


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'cvv', 'CVV'])
                                </div>


                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'expiry', 'Expiry'])
                                </div>




                                <div class=" col-3">
                                    @livewire('text-component-edit', [$sale, 'agent_name', 'Agent Name'])
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            @can('sale.update')
                                <button type="submit" class="bg-primary rounded text-white border-0 p-2">Edit Sale</button>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>
<div class="col-12 " style=" display:flex; justify-content: flex-end">
    @can('sale.update')
        <button type="button" class="bg-success rounded text-white border-0 p-2" data-toggle="modal"
            data-target="#exampleModal1">
            Show Sale Panel
        </button>
    @endcan
</div>
</form>
</div>
<script>
    function validateForm() {
        var selectElement = document.getElementById('call_dispose');
        var selectedValue = selectElement.value;

        if (selectedValue === '' || selectedValue === 'Call Dispose') {
            alert('Please select a Call Dispose before submitting the form.');
            return false;
        }

        // Form submission logic (if needed) goes here...

        return true; // Return true to allow form submission
    }

    function updateFieldsValidation() {
        var selectElement = document.getElementById('call_dispose');
        var selectedValue = selectElement.value;
        var requiredFields = [
            'f_name',
            'l_name',
            'm_name',
            'phone',
            'alt_phone',
            'email',
            'address_1',
            'address_2',
            'city',
            'state',
            'zip',
            'current_service_provider',
            'current_service',
            'current_issue'
        ];

        // Check if the selected option is 'Run Credit Check'
        // Check if the selected option is 'Run Credit Check'
        if (selectedValue === 'Run Credit Check' || selectedValue === 'Credit Check Done' || selectedValue ===
            'Verification Done' || selectedValue === 'Run Verification') {
            $('#services').addClass('d-block').removeClass('d-none');
        } else {
            $('#services').addClass('d-none');
        }

        if (selectedValue === 'Credit Check Done' || selectedValue === 'Run Credit Check' || selectedValue ===
            'Verification Done' || selectedValue === 'Run Verification') {
            $('#credit_check_info').addClass('d-block').removeClass('d-none');
        } else {
            $('#credit_check_info').addClass('d-none');
        }

        if (selectedValue === 'Credit Check Done' || selectedValue === 'Verification Done' || selectedValue ===
            'Run Verification') {
            $('#pass-fail').addClass('d-block').removeClass('d-none');
        } else {
            $('#pass-fail').addClass('d-none');
        }

        if (selectedValue === 'Run Credit Check' || selectedValue === 'call back' || selectedValue ===
            'Credit Check Done') {
            for (var field of requiredFields) {
                document.getElementById(field).setAttribute('required', 'true');

            }
        } else {
            for (var field of requiredFields) {
                document.getElementById(field).removeAttribute('required');

            }
        }

    }

    document.addEventListener("DOMContentLoaded", function() {
        // Call your function here
        updateFieldsValidation();
    });
</script>
