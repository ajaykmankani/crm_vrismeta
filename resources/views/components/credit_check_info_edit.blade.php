<div>

    <div class="input-group mb-3">
        <span style="color:black" class="input-group-text">CreditCheck Mode</span>
        <select class="form-control" name="mode_of_cc" id="mode_of_cc" onchange="varificationMode()">
            <option selected disabled>Select CreditCheck Method</option>
            <option @if ($lead->mode_of_cc == 'social security number') selected @endif value="social security number">Social Security
                Number</option>
            <option @if ($lead->mode_of_cc == 'driving license') selected @endif value="driving license">Driving License</option>
            <option @if ($lead->mode_of_cc == 'state id') selected @endif value="state id">State Id</option>
            <option @if ($lead->mode_of_cc == 'tax id') selected @endif value="tax id">Tax ID</option>
        </select>
    </div>
    <div style="z-index: 100; position: absolute;">
        <div class="d-none" id="dl">
            <div class="input-group mb-3">
                <span class="input-group-text">Driving License Number</span>
                <input type="number" name="driving license number" class="form-control"
                    value="{{ $lead->driving_license_number }}" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Expiry Date</span>
                <input type="date" name="licanse expiry date" value="{{ date('Y-m-d', $lead->license_expiry_date) }}"
                    class="form-control" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Issuing State</span>
                <input type="text" name="driving license issuing state"
                    value="{{ $lead->driving_license_issuing_state }}" class="form-control" />
            </div>
        </div>

        <div class="d-none" id="state_id">
            <div class="input-group mb-3">
                <span class="input-group-text">State ID Number</span>
                <input type="number" name="state id number" value="{{ $lead->state_id_number }}"
                    class="form-control" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Expiry Date</span>
                <input type="date" name="state_id_expiry_date"
                    value="{{ date('Y-m-d', strtotime($lead->state_id_expiry_date)) }}" class="form-control" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Issuing State</span>
                <input type="text" name="state id issuing state" value="{{ $lead->state_id_issuing_state }}"
                    class="form-control" />
            </div>
        </div>

        <div class="d-none" id="tax_id">
            <div class="input-group mb-3">
                <span class="input-group-text">Tax ID Number</span>
                <input type="number" name="tax id number" value="{{ $lead->tax_id_number }}" class="form-control" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Expiry Date</span>
                <input type="date" name="tax id expiry date" value="{{ date('Y-m-d', strtotime($lead->tax_id_expiry_date)) }}"
                    class="form-control" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Issuing State</span>
                <input type="text" name="tax id issuing state" value="{{ $lead->tax_id_issuing_state }}"
                    class="form-control" />
            </div>
        </div>

        <div class="d-none" id="ssn">
            <div class="input-group mb-3">
                <span class="input-group-text">Social Security Number</span>
                <input type="text" name="social security number" value="{{ $lead->social_security_number }}"
                    class="form-control" />
            </div>
        </div>
    </div>

    <script>
        function varificationMode() {
            let selectElementCreditCheck = document.getElementById('mode_of_cc');
            let selectedValueCreditCheck = selectElementCreditCheck.value;
            console.log(selectedValueCreditCheck);
            if (selectedValueCreditCheck === 'social security number') {
                $('#ssn').addClass('d-block').removeClass('d-none');
            } else {
                $('#ssn').addClass('d-none');
            }
            if (selectedValueCreditCheck === "driving license") {
                $('#dl').addClass('d-block').removeClass('d-none');
            } else {
                $('#dl').addClass('d-none');
            }

            if (selectedValueCreditCheck === "state id") {
                $('#state_id').addClass('d-block').removeClass('d-none');
            } else {
                $('#state_id').addClass('d-none');
            }

            if (selectedValueCreditCheck === "tax id") {
                $('#tax_id').addClass('d-block').removeClass('d-none');
            } else {
                $('#tax_id').addClass('d-none');
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Call your function here
            varificationMode();
        });
    </script>
</div>
