@extends('admin.template.header')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Create Roles and Permission</h4>
                        <h6 class="font-weight-light">Create New Role & Permission</h6>


                        <ol>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>

                        <a class="text-white" style="text-decoration: none;"
                            href="{{ route('check_role_permission') }}"><button type="button"
                                class="btn-sm text-white bg-dark rounded border-0">Check Roles
                                Permission</button></a>



                        <form action="{{ route('store_role') }}" method="POST" class="pt-3" id="registration-form">
                            @csrf<div class="row">

                                <div class="form-group col-12">
                                    <input type="text" id="name" name="name" placeholder="Role Name"
                                        value="{{ old('name') }}" class="form-control form-control-lg" required>
                                </div>
                            </div>
                            <div class="col-12">

                                <button type="submit" class="bg-primary rounded text-white border-0 p-2">Create
                                    Role</button>
                            </div>

                            <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                        </form>


                        <div class="row">
                            <div class="col-3">
                                <ol>
                                    @foreach ($roles as $roleId => $roleName)
                                        <div class="row">
                                            <div class="col-6">
                                                <li>{{ $roleName }}</li>
                                            </div>
                                            @if ($roleName == 'admin' || $roleName == 'user')
                                            @else
                                                <div class="col-6"><a
                                                        href="{{ route('role_delete', ['id' => $roleId]) }}"><i
                                                            class="bi bi-x-lg text-danger"
                                                            onclick="return confirm('Are you sure you want to delete this role?')"></i></a>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </ol>
                            </div>
                        </div>



                        <form action="{{ route('store_permission') }}" method="POST" class="pt-3" id="registration-form">
                            @csrf<div class="row">

                                <div class="form-group col-12">
                                    <input type="text" id="name" name="name" placeholder="Permission Name"
                                        value="{{ old('name') }}" class="form-control form-control-lg" required>
                                </div>
                            </div>
                            <div class="col-12">

                                <button type="submit" class="bg-primary rounded text-white border-0 p-2">Create
                                    Permission</button>
                            </div>

                            <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                        </form>


                        <div class="row">
                            <div class="col-4">
                                <ol>
                                    @foreach ($permissions as $permissionId => $permissionName)
                                        <div class="row">
                                            <div class="col-6">
                                                <li>{{ $permissionName }}</li>
                                            </div>
                                            @if ($permissionName == 'admin' || $permissionName == 'user')
                                            @else
                                                <div class="col-6"><a
                                                        href="{{ route('permission_delete', ['id' => $permissionId]) }}"><i
                                                            class="bi bi-x-lg text-danger"
                                                            onclick="return confirm('Are you sure you want to delete this permission?')"></i></a>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </ol>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
