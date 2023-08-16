<div>
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
                                                id="basic-addon3">Result</span>
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
</div>
