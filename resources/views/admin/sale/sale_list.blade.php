@extends('admin.template.header')
@can('sale.listing')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sale Table</h4>
                            @can('lead.create')
                                <a class="text-white" style="text-decoration: none;" href="{{ route('lead_index') }}"> <button
                                        type="button" class="btn btn-success text-white rounded"><i
                                            class="bi bi-plus-circle-fill"></i></button></a>
                            @endcan
                            @can('sale.download')
                                <a href="{{ route('download-csv-sale') }}" class="btn btn-primary">Dwonload <i
                                        class="bi bi-filetype-csv"></i></a>
                            @endcan
                            @can('sale.create')
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadCSV">
                                    Upload <i class="bi bi-filetype-csv"></i>
                                </button>
                            @endcan
                            @can('sale.delete')
                                <button class="btn btn-danger delete-selected-btn" form="myForm" value="delete-multiple"
                                    onclick="return confirm('Are you sure you want to delete selected sales?')"><i
                                        class="bi bi-trash3-fill"></i></button>
                            @endcan

                            @if (session('success'))
                                <div class="alert alert-primary">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="table-responsive" id="pagination-container">
                                <form id="myForm" action="{{ route('sale_delete_multiple') }}" method="post">
                                    @csrf
                                    <select id="dateDropdown"></select>
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th><span><input type="checkbox" name="all" id="all"
                                                            class="check-all">All</span></th>
                                                <th>Status</th>
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
                                            @php $no = 0 @endphp
                                            @foreach ($sales as $sale)
                                                @php $no++ @endphp
                                                <tr>
                                                    <td><b>{{ $no }}</b> &nbsp; &nbsp; <input type="checkbox"
                                                            value="{{ $sale->id }}" name="sales[]" class="check-item"></td>
                                                    <td><label
                                                            class="badge
                                                    <?php
                                                    if ($sale->call_dispose == 'Active account' || $sale->call_dispose == 'active account') {
                                                        echo 'bg-success';
                                                    } elseif ($sale->call_dispose == 'Ghost' || $sale->call_dispose == 'ghost') {
                                                        echo 'bg-dark';
                                                    } elseif ($sale->call_dispose == 'Run Credit Check' || $sale->call_dispose == 'run credit check') {
                                                        echo 'bg-warning';
                                                    } elseif ($sale->call_dispose == 'Credit Check Don' || $sale->call_dispose == 'credit check don') {
                                                        echo 'bg-pending';
                                                    } else {
                                                        echo 'bg-danger';
                                                    }
                                                    ?>
                                                    ">{{ ucfirst($sale->call_dispose) }}
                                                        </label>
                                                        @can('sale.view')
                                                            <i class="bi bi-eye-fill btn-sm"
                                                                style="font-size: 20px; cursor: pointer;" data-toggle="modal"
                                                                data-target="#exampleModal{{ $sale->id }}"></i>
                                                        @endcan
                                                    </td>

                                                    <td>{{ date('d-m-Y', strtotime($sale->date)) }}</td>
                                                     <td style="font-weight: 600">{{ $sale->unique_id }}</td>
                                                    <td>{{ $sale->f_name }}</td>
                                                    <td>{{ $sale->m_name }}</td>
                                                    <td>{{ $sale->l_name }}</td>
                                                    <td>{{ $sale->email }}</td>
                                                    <td>{{ hideSensitiveData($sale->phone) }}</td>

                                                    <td>
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="" data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="bi bi-three-dots-vertical"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                @can('sale.delete')
                                                                    <div class="dropdown-item">
                                                                        <form action="{{ route('sale_delete') }}" method="post"
                                                                            onsubmit="return confirm('Are you sure you want to delete this sale?')">
                                                                            @csrf
                                                                            <input type="hidden" name="sale_id"
                                                                                value="{{ $sale->id }}">
                                                                            <input type="submit" value="Delete"
                                                                                class="btn btn-outline-* btn-sm">
                                                                        </form>
                                                                    </div>
                                                                @endcan
                                                                @can('sale.update')
                                                                    <div class="dropdown-item">
                                                                        <form action="{{ route('sale_edit') }}" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="sale_id"
                                                                                value="{{ $sale->id }}">
                                                                            <input type="submit" value="Edit"
                                                                                class="btn btn-outline-* btn-sm">
                                                                        </form>
                                                                    </div>
                                                                @endcan
                                                                @can('sale.view')
                                                                    <div class="dropdown-item">
                                                                        <button type="button" class="btn btn-outline-* btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModal{{ $sale->id }}">
                                                                            View
                                                                        </button>
                                                                    </div>
                                                                @endcan

                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <div class="modal fade bd-example-modal-lg"
                                                    id="exampleModal{{ $sale->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-fullscreen" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Sale Detail</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <?php $details = ['f_name', 'm_name', 'l_name', 'phone', 'alt_phone', 'email', 'address_1', 'address_2', 'city', 'state', 'zip_code', 'current_service_provider', 'current_service', 'current_issue', 'call_dispose', 'comment', 'product', 'service', 'order_number', 'order_confirmation_number', 'reference_number', 'monthly_bill', 'technician_date_and_time', 'one_time_fee', 'security_passcode', 'security_question', 'credit_check', 'mode_of_cc', 'mode_of_payment', 'toll_free_number', 'dob', 'ssn', 'card_number', 'xp', 'agent_name', 'user_name']; ?>

                                                                        @foreach ($details as $detail)
                                                                            <div class="col-2"
                                                                                style="border-bottom: solid #c5c5c5 1px; padding:5px">
                                                                                <?php
                                                                                $x = explode('_', $detail);
                                                                                $data = implode(' ', $x);

                                                                                ?>
                                                                                <b>{{ ucfirst($data) }}</b>
                                                                            </div>
                                                                            <div class="col-2"
                                                                                style="border-bottom: solid #c5c5c5 1px; padding:5px">
                                                                                <?php if($detail == 'status'){?>
                                                                                <label
                                                                                    class="badge <?= $sale->$detail == 'Active' ? 'bg-success' : ($sale->$detail == 'pending' ? 'bg-warning' : 'bg-danger') ?>">{{ $sale->$detail }}</label>
                                                                                <?php }else if($detail == 'phone'){?>
                                                                                {{ hideSensitiveData($sale->$detail) }}
                                                                                <?php }else if($detail == 'alt_phone'){?>
                                                                                {{ hideSensitiveData($sale->$detail) }}
                                                                                <?php }else if($detail == 'card_number'){?>
                                                                                {{ hideSensitiveData($sale->$detail) }}
                                                                                <?php }else if($detail == 'product'){?>
                                                                                @php
                                                                                    $product = [];
                                                                                    parse_str(str_replace(', ', '&', $sale->$detail), $product);
                                                                                    foreach ($product as $key => $value) {
                                                                                        echo $categories[$key] . ' = ' . $value . '<br/>';
                                                                                    }
                                                                                @endphp

                                                                                <?php }else if($detail == 'service'){?>
                                                                                @php
                                                                                    $service = [];
                                                                                    parse_str(str_replace(', ', '&', $sale->$detail), $service);
                                                                                    foreach ($service as $key => $value) {
                                                                                        echo $categories[$key] . ' = ' . $value . '<br/>';
                                                                                    }
                                                                                @endphp

                                                                                <?php }else{?>

                                                                                {{ $sale->$detail }}
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
                                </form>

                                <div class="modal fade " id="uploadCSV" tabindex="-1" role="dialog"
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
                                                    <form action="{{ route('upload_sale') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" class="form-control" name="file"
                                                            accept=".csv">
                                                        <button type="submit" class="form-control">Upload</button>
                                                    </form>
                                                    <p>Sample file: <a href="{{ asset('csv/sale_sample.csv') }}">Download</a>
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>

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

            $(document).ready(function() {


                $('#all').on('change', function() {
                    $('.check-item').prop('checked', this.checked);
                    toggleDeleteButton();
                });
                // #myInput is a <input type="text"> element
                $('#tableSearch').on('keyup', function() {
                    table.search(this.value).draw();
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
