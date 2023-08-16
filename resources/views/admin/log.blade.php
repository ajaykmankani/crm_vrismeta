@extends('admin.template.header')
@can('log.view')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Log Table</h4>



                            <div class="table-responsive" id="pagination-container">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Activity</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activityLogs as $activityLog)
                                            <tr>
                                                <td>{{ $activityLog->user->name }}</td>
                                                <td>{{ $activityLog->activity_description }}</td>
                                                <td>{{ date('d-m-Y', strtotime($activityLog->created_at)) }}</td>
                                            </tr>
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
                    [2, "desc"]
                ] // Assuming the first column contains the date or ID of the data
            });
        </script>
        <!-- content-wrapper ends -->
    @endsection
@endcan
