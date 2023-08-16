@extends('admin.template.header')
@can('employee.view')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />



        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Employee Table</h4>
                            @can('employee.create')
                                <button type="button" class="btn-sm text-white bg-success rounded border-0"><a class="text-white"
                                        style="text-decoration: none;" href="{{ route('employee_index') }}"><i
                                            class="bi bi-plus-lg"></i></i></a></button>
                            @endcan
                            @can('employee.download')
                                <a href="{{ route('download-csv-employee') }}" class="btn btn-primary">Download CSV</a>
                            @endcan
                            <div class="table-responsive" id="pagination-container">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Designation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userTableBody">
                                        @php $no = 0 @endphp
                                        @foreach ($employees as $employee)
                                            @php $no++ @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ date('d-m-Y', strtotime($employee->date)) }}</td>
                                                <td>{{ $employee->name }}</td>

                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>{{ $employee->designation }}</td>

                                                <td>
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="" data-bs-toggle="dropdown"
                                                            aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @can('employee.delete')
                                                                <div class="dropdown-item">
                                                                    <form action="{{ route('employee_delete') }}" method="post"
                                                                        onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                                                        @csrf
                                                                        <input type="hidden" name="employee_id"
                                                                            value="{{ $employee->id }}">
                                                                        <input type="submit" value="Delete"
                                                                            class="btn btn-outline-* btn-sm">
                                                                    </form>
                                                                </div>
                                                            @endcan
                                                            @can('employee.update')
                                                                <div class="dropdown-item">
                                                                    <form action="{{ route('employee_edit') }}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="employee_id"
                                                                            value="{{ $employee->id }}">
                                                                        <input type="submit" value="Edit"
                                                                            class="btn btn-outline-* btn-sm">
                                                                    </form>
                                                                </div>
                                                            @endcan


                                                            <div class="dropdown-item">
                                                                <button type="button" class="btn btn-outline-* btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#exampleModal{{ $employee->id }}">
                                                                    View
                                                                </button>
                                                            </div>
                                                            @can('view.offer_letter')
                                                                <div class="dropdown-item">
                                                                    <a href="{{ asset('offer_letters/' . $employee->offer_letter) }}"
                                                                        target="__blank">
                                                                        <button type="button" class="btn btn-outline-* btn-sm">
                                                                            Offer Letter
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            @endcan

                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <div class="modal fade" id="exampleModal{{ $employee->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Employee Detail</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <?php $details = ['date', 'name', 'phone', 'alt_phone', 'email', 'curr_address', 'per_address', 'date_of_birth', 'education', 'employment_status', 'last_organization', 'total_experience', 'date_of_joining', 'monthly_salary', 'cab_facility', 'designation', 'source']; ?>
                                                                    @foreach ($details as $detail)
                                                                        <div class="col-6"
                                                                            style="border-bottom: solid #c5c5c5 1px; padding:5px">
                                                                            <?php
                                                                            $x = explode('_', $detail);
                                                                            $data = implode(' ', $x);
                                                                            ?>
                                                                            {{ ucfirst($data) }}
                                                                        </div>
                                                                        <div class="col-6"
                                                                            style="border-bottom: solid #c5c5c5 1px; padding:5px">
                                                                            <?php if($detail == 'status'){?>
                                                                            <label
                                                                                class="badge <?= $employee->$detail == 'active' ? 'bg-success' : ($employee->$detail == 'pending' ? 'bg-warning' : 'bg-danger') ?>">{{ $employee->$detail }}</label>
                                                                            <?php }else if($detail == 'phone'){?>
                                                                            <a
                                                                                href="tel: {{ $employee->$detail }}">{{ $employee->$detail }}</a>
                                                                            <?php }else{?>

                                                                            {{ $employee->$detail }}
                                                                            <?php }?>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </tbody>
                                </table>


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
        </script>
        <!-- content-wrapper ends -->
    @endsection
@endcan
