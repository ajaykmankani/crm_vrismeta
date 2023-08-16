@extends('admin.template.header')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Create Services</h4>
                        <h6 class="font-weight-light">Create New services</h6>


                        <ol>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>

                        {{-- <a class="text-white" style="text-decoration: none;"
                            href="{{ route('check_role_permission') }}"><button type="button"
                                class="btn-sm text-white bg-dark rounded border-0">Check Roles
                                Permission</button></a> --}}



                                <form action="{{ route('service_store') }}" method="POST" class="pt-3" id="registration-form">
                                    @csrf<div class="row">
                                        <div class="form-group col-12">
                                            <select name="product" class="form-control form-control-lg" required>
                                                <option selected disabled>Select a Product</option>
                                                @foreach ($products as $product)
                                                <option value="{{ $product->name }}">{{ $product->name }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                        @for ($i=1; $i <= 20; $i++)

                                            <div class="form-group col-3">
                                                <input type="text" name="services[]" placeholder="Service {{ $i }} "
                                                    value="{{ old('service'.$i) }}" class="form-control form-control-lg">
                                            </div>

                                        @endfor

                                    </div>
                                    <div class="col-12">

                                        <button type="submit" class="bg-primary rounded text-white border-0 p-2">Create Service</button>
                                    </div>

                                    <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                                </form>









                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
