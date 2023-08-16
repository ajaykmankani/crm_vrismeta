@extends('admin.template.header')
@can('user.create')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />




        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4>Create User</h4>
                            <h6 class="font-weight-light">Register New User</h6>
                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ol>
                            <form action="{{ route('adminUserRegister') }}" method="POST" class="pt-3" id="registration-form">
                                @csrf<div class="row">

                                    <div class="form-group col-6">
                                        <input type="text" id="name" name="name" placeholder="Name"
                                            value="{{ old('name') }}" class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-group col-6">

                                        <input type="email" id="email" name="email" placeholder="Email"
                                            value="{{ old('email') }}" class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-group col-6">

                                        <input type="password" id="password" name="password" placeholder="Password"
                                            value="{{ old('password') }}" class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-group col-6">

                                        <select id="role" name="role" required class="form-control form-control-lg">
                                            <option value="" selected>Select a role</option>

                                            @foreach ($roles as $roleId => $roleName)
                                                <option value="{{ $roleId }}">{{ $roleName }}</option>
                                            @endforeach
                                        </select>
                                    </div>


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
        <!-- partial:partials/_footer.html -->

        <!-- content-wrapper ends -->
    @endsection
@endcan
