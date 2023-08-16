<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="images/logo.svg" alt="logo">
                            </div>
                            <h4>New Here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form action="{{ route('registerAction') }}" method="POST" class="pt-3"
                                id="registration-form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" id="name" name="name" placeholder="Name"
                                        class="form-control form-control-lg" required>
                                </div>
                                <div class="form-group">

                                    <input type="email" id="email" name="email"
                                        placeholder="Email"class="form-control form-control-lg" required>
                                </div>
                                <div class="form-group">

                                    <input type="password" id="password" name="password" placeholder="Password"
                                        class="form-control form-control-lg" required>
                                </div>


                                <div class="col-12">
                                    <!-- <input type="submit" value="Register" onclick="submitForm(event)" class="fw-bold text-white btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"> -->
                                    <button type="submit"
                                        class="bg-primary rounded text-white border-0 p-2">Register</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="{{ route('login') }}"
                                        class="text-primary">Login</a>
                                </div>
                                <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                            </form>


                        </div>
                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- register-code -->



</body>

</html>
