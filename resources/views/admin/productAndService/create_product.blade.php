@extends('admin.template.header')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Create Product</h4>
                        <h6 class="font-weight-light">Create New Product</h6>


                        <ol>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>

                        {{-- <a class="text-white" style="text-decoration: none;"
                            href="{{ route('check_role_permission') }}"><button type="button"
                                class="btn-sm text-white bg-dark rounded border-0">Check Roles
                                Permission</button></a> --}}



                                <form action="{{ route('product_store') }}" method="POST" class="pt-3" id="registration-form">
                                    @csrf<div class="row">

                                        <div class="form-group col-12">
                                            <input type="text" id="name" name="name" placeholder="Product Name"
                                                value="{{ old('name') }}" class="form-control form-control-lg" required>
                                        </div>

                                        <div class="form-group col-12">
                                            <select name="category" class="form-control form-control-lg" required >
                                                <option selected disabled>Select a Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <button type="submit" class="bg-primary rounded text-white border-0 p-2">Create Product</button>
                                    </div>

                                    <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                                </form>









                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
