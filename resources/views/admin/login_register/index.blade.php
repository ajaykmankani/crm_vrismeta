<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }}</title>
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body   >
    <div class="container-scroller" >
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0" style="background-color: #fff !important">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto text-center">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                {{ env('APP_NAME') }}
                            </div>
                            <div id="result-container" class="text-danger fw-bold my-2"></div>
                            @if ($errors->has('message'))
                                <p class="text-danger fw-bold">{{ $errors->first('message') }}</p>
                            @elseif ($errors->has('email') || $errors->has('password'))
                                <p class="text-danger fw-bold">Invalid credentials</p>
                            @endif
                            <h4>Hello! Welcome to {{ env('APP_NAME') }} </h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form action="{{ route('loginAction') }}" method="POST" id="my-form" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="Email"
                                        class="form-control form-control-lg text-center" autofocus>
                                </div>
                                <div class="form-group">

                                    <input type="password" name="password" id="password" placeholder="Password"
                                        class="form-control form-control-lg text-center">
                                </div>
                                <div class="mt-3">
                                    <input type="submit" value="Submit" onclick="submitForm(event)"
                                        class="fw-bold text-white btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn w-100">
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    {{-- <div class="form-check">
                                        <input type="checkbox" id="keep-signed-in" class="form-check-input mx-1">
                                        <label class="form-check-label text-muted" for="keep-signed-in">
                                            Keep me signed in
                                        </label>
                                    </div> --}}

                                    {{-- <a href="#" class="auth-link text-black" id="forgot-password-link">Forgot
                                        password?</a> --}}

                                </div>
                                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook me-2"></i>Connect using facebook
                  </button>
                </div> -->
                                <div class="text-center mt-4 font-weight-light">
                                    Contact Us <a href="{{ route('frontend_lead') }}" class="text-primary">Here!</a>
                                </div>
                            </form>

                            <div id="result-container"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- login-code -->


    <!-- <script type="text/javascript">
        // Add event listener to the "Forgot password?" link
        const forgotPasswordLink = document.getElementById('forgot-password-link');
        forgotPasswordLink.addEventListener('click', handleForgotPassword);

        // Function to handle the "Forgot password?" action
        function handleForgotPassword(event) {
            event.preventDefault(); // Prevent default link behavior

            // Implement your logic to handle the "Forgot password?" action here
            // This can include displaying a modal, opening a new page, or making an API request

            // For example, you can redirect the user to a "Forgot Password" page:
            window.location.href = 'forgot-password.html';
        }
    </script> -->
</body>

</html>
