@extends('admin.template.header')
@can('lead.listing')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css"/>



        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lead Table</h4>
                            @can('lead.create')
                                <a class="text-white" style="text-decoration: none;" href="{{ route('lead_index') }}">
                                    <button
                                        type="button" class="btn btn-success text-white rounded"><i
                                            class="bi bi-plus-circle-fill"></i></button>
                                </a>
                            @endcan
                            @can('lead.download')
                                <a href="{{ route('download-csv') }}" class="btn btn-primary">Download <i
                                        class="bi bi-filetype-csv"></i></a>
                            @endcan
                            @can('sale.create')
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#uploadCSV">
                                    Upload <i class="bi bi-filetype-csv"></i>
                                </button>
                            @endcan
                            @can('lead.delete')
                                <button class="btn btn-danger delete-selected-btn" form="myForm" value="delete-multiple"
                                        onclick="return confirm('Are you sure you want to delete selected leads?')"><i
                                        class="bi bi-trash3-fill"></i></button>
                            @endcan
                            <br/>
                            <br/>

                            @if (session('success'))
                                <div class="alert alert-primary">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <select id="dateDropdown"></select>
                            <div class="table-responsive" id="pagination-container">
                                <form id="myForm" action="{{ route('lead_delete_multiple') }}" method="post">
                                    @csrf
                                    <table class="table" id="myTable">
                                        <thead>
                                        <tr>
                                            <th><span><input type="checkbox" name="all" id="all"
                                                             class="check-all">All</span></th>
                                            <th>Call Dispose</th>
                                            <th>Date</th>
                                            <th>Unique ID</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>


                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="userTableBody">


                                        @foreach ($leads as $key=> $lead)

                                            <tr>
                                                <td>{{ $key+1 }} &nbsp;&nbsp;<input type="checkbox"
                                                                                    value="{{ $lead->id }}"
                                                                                    name="leads[]" class="check-item">
                                                </td>
                                                <td>
                                                    <label class="badge
                                                    <?php
                                                    if ($lead->call_dispose == 'Active account' || $lead->call_dispose == 'active account') {
                                                        echo '';
                                                    } elseif ($lead->call_dispose == 'Ghost' || $lead->call_dispose == 'ghost') {
                                                        echo '';
                                                    } elseif ($lead->call_dispose == 'Run Credit Check' || $lead->call_dispose == 'run credit check') {
                                                        echo 'bg-warning';
                                                    } elseif ($lead->call_dispose == 'Credit Check Don' || $lead->call_dispose == 'credit check don') {
                                                        echo '';
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>
                                                    " style="color:#000;">{{ ucfirst($lead->call_dispose) }}
                                                    </label>
                                                </td>
                                                <td>{{ date('d-m-Y', strtotime($lead->date)) }}</td>
                                                <td style="font-weight: 600">{{ $lead->unique_id }}</td>
                                                <td>{{ $lead->f_name }}</td>
                                                <td>{{ $lead->m_name }}</td>
                                                <td>{{ $lead->l_name }}</td>

                                                <td>{{ $lead->email }}</td>
                                                <td>{{ hideSensitiveData($lead->phone, 4) }}</td>
                                                <img src="">

                                                <td>
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="" data-bs-toggle="dropdown"
                                                           aria-expanded="false"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @can('lead.delete')
                                                                <div class="dropdown-item">
                                                                    <form action="{{ route('lead_delete') }}"
                                                                          method="post"
                                                                          onsubmit="return confirm('Are you sure you want to delete this lead?')">
                                                                        @csrf
                                                                        <input type="hidden" name="lead_id"
                                                                               value="{{ $lead->id }}">
                                                                        <input type="submit" value="Delete"
                                                                               class="btn btn-outline-* btn-sm">
                                                                    </form>
                                                                </div>
                                                            @endcan
                                                            @can('lead.update')
                                                                <div class="dropdown-item">


                                                                    <a href="{{ route('lead_edit_2', $lead->id) }}">
                                                                        <div class="btn btn-outline-* btn-sm">Edit</div>
                                                                    </a>

                                                                </div>
                                                            @endcan
                                                            @can('lead.view')
                                                                <div class="dropdown-item">
                                                                    <button type="button"
                                                                            class="btn btn-outline-* btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModal{{ $lead->id }}">
                                                                        View
                                                                    </button>
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <div class="modal fade" id="exampleModal{{ $lead->id }}" tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lead
                                                                Detail</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                        <?php $details = ['date', 'f_name', 'm_name', 'l_name', 'phone', 'alt_phone', 'email', 'address_1', 'address_2', 'city', 'state', 'zip_code', 'current_service_provider', 'current_service', 'current_issue', 'comment', 'user_name']; ?>
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
                                                                                <?php if ($detail == 'status'){ ?>
                                                                            <label
                                                                                class="badge <?= $lead->$detail == 'active' ? 'bg-success' : ($lead->$detail == 'pending' ? 'bg-warning' : 'bg-danger') ?>">{{ $lead->$detail }}</label>
                                                                            <?php }else if ($detail == 'phone'){ ?>
                                                                            {{ hideSensitiveData($lead->$detail) }}
                                                                            <?php }else if ($detail == 'alt_phone'){ ?>
                                                                            {{ hideSensitiveData($lead->$detail) }}
                                                                            <?php }else{ ?>

                                                                            {{ $lead->$detail }}
                                                                            <?php } ?>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </form>

                                <div class="modal fade" id="uploadCSV" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload CSV</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <form action="{{ route('upload_lead') }}" method="POST"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" class="form-control" name="file"
                                                               accept=".csv">
                                                        <button type="submit" class="form-control">Upload</button>
                                                    </form>
                                                    <p>Sample file: <a href="{{ asset('csv/lead_sample.csv') }}">Download</a>
                                                    </p>
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
                integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script></script>


        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                let table = new DataTable('#myTable', {
                    scrollY: 400,
                    "order": [
                        [0, "asc"]
                    ] // Assuming the first column contains the date or ID of the data
                });

                // Get unique dates from the third column
                function getUniqueDates() {
                    let uniqueDates = ['Today']; // Add 'Today' as the default selected option
                    $('#myTable tbody tr').each(function() {
                        let date = $(this).find('td:eq(2)').text(); // Assuming third column contains the date
                        if (!uniqueDates.includes(date)) {
                            uniqueDates.push(date);
                        }
                    });
                    return uniqueDates;
                }

                // Populate the dropdown with unique dates in descending order
                function populateDateDropdown(dates) {
                    let dropdown = $('#dateDropdown');
                    dropdown.empty();

                    // Add 'Today' option and select it by default
                    dropdown.append($('<option>', {
                        value: 'today',
                        text: 'Today'
                    }).prop('selected', true));

                    // Convert and parse dates before sorting
                    dates.sort(function(a, b) {
                        let dateA = new Date(a.split('-').reverse().join('-'));
                        let dateB = new Date(b.split('-').reverse().join('-'));
                        return dateB - dateA;
                    });

                    $.each(dates, function(index, date) {
                        // Skip adding 'Today' again in the loop
                        if (date !== 'Today') {
                            dropdown.append($('<option>', {
                                value: date,
                                text: date
                            }));
                        }
                    });
                }




                // Event listener for date selection
                $('#dateDropdown').on('change', function() {
                    let selectedDate = $(this).val();

                    // Check for 'today' option
                    if (selectedDate === 'today') {
                        // Get today's date in the desired format (dd-mm-yyyy)
                        let today = new Date();
                        let dd = String(today.getDate()).padStart(2, '0');
                        let mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                        let yyyy = today.getFullYear();

                        today = dd + '-' + mm + '-' + yyyy;

                        table.search(today).draw();
                    } else {
                        table.search(selectedDate).draw();
                    }
                });

                // Initialize
                let uniqueDates = getUniqueDates();
                populateDateDropdown(uniqueDates);

                // Select 'Today' by default
                $('#dateDropdown').val('today').trigger('change');
            });







            $(document).ready(function () {


                $('#all').on('change', function () {
                    $('.check-item').prop('checked', this.checked);
                    toggleDeleteButton();
                });

                // Handle individual checkbox click event
                $(document).on('change', '.check-item', function () {
                    if ($('.check-item:checked').length === $('.check-item').length) {
                        $('#all').prop('checked', true);
                        toggleDeleteButton();
                    } else {
                        $('#all').prop('checked', false);
                        toggleDeleteButton();
                    }
                });
            });
            // #myInput is a <input type="text"> element
            $('#tableSearch').on('keyup', function () {
                table.search(this.value).draw();
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
