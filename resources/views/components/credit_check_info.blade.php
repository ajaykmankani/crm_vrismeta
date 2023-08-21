<div>
    <div class="input-group mb-3">
        <span style="color:black" class="input-group-text">CC Method</span>
        <select class="form-control" name="mode_of_cc" id="creditCheck_mode" onchange="creditCheckInfo()">
            <option selected disabled>Select Credit Check Method</option>
            <option value="social security number">Social Security Number</option>
            <option value="driving license">Driving License</option>
            <option value="state id">State Id</option>
            <option value="tax id">Tax ID</option>
        </select>
    </div>
    <div style="z-index: 100; position: absolute;">
        <div class="d-none" id="dl">
            <div class="input-group mb-3">
                <span class="input-group-text">Driving License Number</span>
                <input type="number" name="driving license number" class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Expiry Date</span>
                <input type="date" name="licanse expiry date" class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Issuing State</span>
                <input type="text" name="driving license issuing state" class="form-control"/>
            </div>
        </div>

        <div class="d-none" id="state_id">
            <div class="input-group mb-3">
                <span class="input-group-text">State ID Number</span>
                <input type="number" name="state id number" class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Expiry Date</span>
                <input type="date" name="state id expiry date" class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Issuing State</span>
                <input type="text" name="state id issuing state" class="form-control"/>
            </div>
        </div>

        <div class="d-none" id="tax_id">
            <div class="input-group mb-3">
                <span class="input-group-text">Tax ID Number</span>
                <input type="number" name="tax id number" class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Expiry Date</span>
                <input type="date" name="tax id expiry date" class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Issuing State</span>
                <input type="text" name="tax id issuing state" class="form-control"/>
            </div>
        </div>

        <div class="d-none" id="ssn">
            <div class="input-group mb-3">
                <span class="input-group-text">Social Security Number</span>
                <input type="text" name="social security number" class="form-control"/>
            </div>
        </div>
    </div>

    <script>
        function creditCheckInfo() {
            let selectElementCreditCheck = document.getElementById('creditCheck_mode');
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
    </script>
</div>
