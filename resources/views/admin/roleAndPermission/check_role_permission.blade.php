@extends('admin.template.header')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Roles and Permissions</h4>
                        <h6 class="font-weight-light">Assign or revoke permission from roles</h6>


                        <ol>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>

                        <form action="{{ route('assign_permission') }}" method="POST" class="pt-3" id="registration-form">
                            @csrf<div class="row">

                                <div class="form-group col-6">
                                    <select id="role_id" name="role_id" class="form-control form-control-lg" required>
                                        <option selected disabled>Select Role</option>
                                        @foreach ($roles as $roleID => $roleName)
                                            <option value="{{ $roleID }}">{{ $roleName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">

                                    <select data-mdb-filter="true" id="permission_id" name="permission_id"
                                        class="form-control form-control-lg" required>
                                        <option selected disabled>Select Permission</option>
                                        @foreach ($permissions as $permissionID => $permissionName)
                                            <option value="{{ $permissionID }}">{{ $permissionName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-12">

                                <button type="submit" class="bg-primary rounded text-white border-0 p-2">Assign
                                    Permission</button>
                            </div>

                            <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                        </form>
                        <form action="{{ route('check_role_permission_post') }}" method="POST" class="pt-3"
                            id="registration-form">
                            @csrf<div class="row">

                                <div class="form-group col-6">
                                    <select id="role_id" name="role_id" class="form-control form-control-lg" required>
                                        <option selected disabled>Select Role</option>
                                        @foreach ($roles as $roleID => $roleName)
                                            <option value="{{ $roleID }}">{{ $roleName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <div class="col-12">

                                <button type="submit" class="bg-primary rounded text-white border-0 p-2">Check
                                    Permission</button>
                            </div>

                            <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                        </form>
                        @if ($role != null)
                            <form action="{{ route('revoke_permission') }}" method="POST" class="pt-3"
                                id="registration-form">
                                @csrf<div class="row">

                                    <div class="form-group col-6">
                                        <select id="role_id" name="role_id" class="form-control form-control-lg" required>
                                            <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">

                                        <select data-mdb-filter="true" id="permission_id" name="permission_id"
                                            class="form-control form-control-lg" required>
                                            <option selected disabled>See Permissions</option>
                                            @foreach ($role_permissions as $permissionID => $permissionName)
                                                <option value="{{ $permissionID }}">{{ $permissionName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12">

                                    <button type="submit" class="bg-primary rounded text-white border-0 p-2">Revoke
                                        Permission</button>
                                </div>

                                <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                            </form>
                        @endif



                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
