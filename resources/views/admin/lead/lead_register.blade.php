@extends('admin.template.header')
@can('lead.create')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h4>Register Lead/Sale</h4>
                                </div>
                                <div class="col-2"></div>
                                {{-- <div class="col-3">
                                    <div class="input-group mb-3">

                                        <input class="form-control form-control-lg" type="text" placeholder="Search"
                                            name="service[]">
                                    </div>
                                </div> --}}
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ol>

                            <x-lead-register-form :categories="$categories" :services="$services" :products="$products" />

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <script>
            // Add 'is-valid' class to the input fields when they have a value
            document.addEventListener('input', function(event) {
                if (event.target.tagName === 'INPUT' || event.target.tagName === 'SELECT') {
                    var inputElement = event.target;
                    if (inputElement.value.trim() !== '') {
                        inputElement.classList.add('is-valid');

                    } else {
                        inputElement.classList.remove('is-valid');

                    }
                }
            });
        </script>
        <x-calculator />
        {{-- @livewire('calculator') --}}
        <!-- content-wrapper ends -->
    @endsection
@endcan
