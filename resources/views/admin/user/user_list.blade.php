@extends('admin.template.header')
@can('user.view')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />



        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">User Table</h4>
                            @can('user.create')
                                <a class="text-white" style="text-decoration: none;" href="{{ route('user_register') }}"><button
                                        type="button" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i></button></a>
                            @endcan
                            @can('user.download')
                                <a href="{{ route('download-csv') }}" class="btn btn-primary">Dwonload <i
                                        class="bi bi-filetype-csv"></i></a>
                            @endcan
                            @can('user.delete')
                                <button class="btn btn-danger delete-selected-btn" form="myForm" value="delete-multiple"
                                    onclick="return confirm('Are you sure you want to delete selected users?')"><i
                                        class="bi bi-trash3-fill"></i></button>
                            @endcan
                            <div class="table-responsive" id="pagination-container">
                                <form id="myForm" action="{{ route('user_delete_multiple') }}" method="post">
                                    @csrf
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th><span><input type="checkbox" name="all" id="all"
                                                            class="check-all">
                                                        &nbsp;&nbsp;All</span></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userTableBody">
                                            @php $no = 0 @endphp
                                            @foreach ($users as $user)
                                                @php $no++ @endphp
                                                <tr>
                                                    <td>{{ $no }} &nbsp;&nbsp;<input type="checkbox"
                                                            value="{{ $user->id }}" name="users[]" class="check-item"></td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @foreach ($user->getRoleNames() as $role)
                                                            {{ $role }}
                                                        @endforeach
                                                    </td>

                                                    <td>

                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="" data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="bi bi-three-dots-vertical"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                            {{-- @can('user.delete')

                                                                    <div class="dropdown-item">
                                                                        <form action="{{ route('user_delete') }}" method="post"
                                                                            onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                                            @csrf
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ $user->id }}">
                                                                            <input type="submit" value="Delete"
                                                                                class="btn btn-outline-* btn-sm">
                                                                        </form>
                                                                    </div>
                                                                @endcan --}}
                                                                @can('user.update')
                                                                    <div class="dropdown-item">
                                                                        <form action="{{ route('user_edit') }}" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ $user->id }}">
                                                                            <input type="submit" value="Edit"
                                                                                class="btn btn-outline-* btn-sm">
                                                                        </form>
                                                                    </div>
                                                                @endcan


                                                            </div>
                                                        </div>

                                                    </td>

                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
            integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>


        <script>
            let table = new DataTable('#myTable', {
                "order": [
                    [0, "asc"]
                ] // Assuming the first column contains the date or ID of the data
            });

            $(document).ready(function() {


                $('#all').on('change', function() {
                    $('.check-item').prop('checked', this.checked);
                    toggleDeleteButton();
                });

                // Handle individual checkbox click event
                $(document).on('change', '.check-item', function() {
                    if ($('.check-item:checked').length === $('.check-item').length) {
                        $('#all').prop('checked', true);
                        toggleDeleteButton();
                    } else {
                        $('#all').prop('checked', false);
                        toggleDeleteButton();
                    }
                });
            });

            // Toggle Delete Selected button visibility
            function toggleDeleteButton() {
                var checkedCount = $('.check-item:checked').length;
                if (checkedCount > 0) {
                    $('.delete-selected-btn').show();
                } else {
                    $('.delete-selected-btn').hide();
                }
            }

            // Hide Delete Selected button initially
            toggleDeleteButton();
        </script>
        <!-- content-wrapper ends -->
    @endsection
@endcan
