@extends('admin.template.header')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Create Product and Service</h4>
                        <h6 class="font-weight-light">Create New Product and Service</h6>


                        <ol>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>
 <button
                                type="button" class="btn-sm text-white bg-dark rounded border-0" data-bs-toggle="modal" data-bs-target="#exampleModalCategory">Create
                                Category</button>
                        <button
                                type="button" data-bs-toggle="modal" data-bs-target="#exampleModalProduct" class="btn-sm text-white bg-dark rounded border-0">Create
                                Product</button>


                        <button
                                type="button" data-bs-toggle="modal" data-bs-target="#exampleModalServices" class="btn-sm text-white bg-dark rounded border-0">Create
                                Service</button>



<!-- Modal -->
<div class="modal fade" id="exampleModalProduct" tabindex="-1" aria-labelledby="exampleModalProductLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalProductLabel">Create Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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

                                    </div>

                                    <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCategory" tabindex="-1" aria-labelledby="exampleModalCategoryLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCategoryLabel">Create Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
           <form action="{{ route('product_categories.create') }}" method="POST" class="pt-3" id="registration-form">
                                    @csrf<div class="row">

                                        <div class="form-group col-12">
                                            <input type="text" id="category_name" name="category_name" placeholder="Category Name"
                                                value="{{ old('category_name') }}" class="form-control form-control-lg" required>
                                        </div>
                                    </div>
                                    <div class="col-12">


                                    </div>

                                    <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
 </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalServices" tabindex="-1" aria-labelledby="exampleModalServicesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalServicesLabel">Create Services</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
                                        @for ($i=1; $i <= 10; $i++)

                                            <div class="form-group col-12">
                                                <input type="text" name="services[]" placeholder="Service {{ $i }} "
                                                    value="{{ old('service'.$i) }}" class="form-control form-control-lg">
                                            </div>

                                        @endfor

                                    </div>
                                    <div class="col-12">


                                    </div>

                                    <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
 </form>
      </div>
    </div>
  </div>
</div>

   <div class="row">


                            <div class="col-3">
                                <label for="">Category</label>
                                <ol>
                                    @foreach ($categories as $category)
                                        <div class="row">
                                            <div class="col-6">
                                                <li>{{ $category->category_name }}</li>
                                            </div>

                                            <div class="col-6"><a
                                                    href="{{ route('product_categories.edit', ['id' => $category->id]) }}"><i
                                                        class="bi bi-pen text-success"
                                                        ></i></a>
                                                <a href="{{ route('product_categories.delete', ['id' => $category->id]) }}"><i
                                                        class="bi bi-x-lg text-danger"
                                                        onclick="return confirm('Are you sure you want to delete this product?')"></i></a>
                                            </div>

                                        </div>
                                    @endforeach
                                </ol>
                            </div>


                            <div class="col-3">
                                <label for="">Product</label>
                                <ol>
                                    @foreach ($products as $product)
                                        <div class="row">
                                            <div class="col-6">
                                                <li>{{ $product->name }}</li>
                                            </div>


                                            <div class="col-6"><a
                                                    href="{{ route('product_destroy', ['id' => $product->id]) }}"><i
                                                        class="bi bi-x-lg text-danger"
                                                        onclick="return confirm('Are you sure you want to delete this product?')"></i></a>
                                            </div>

                                        </div>
                                    @endforeach
                                </ol>
                            </div>


                            <div class="col-3">
                                 <label for="">Services</label>
                                <ol>
                                    @foreach ($services as $service)
                                        <div class="row">
                                            <div class="col-6">
                                                <li>{{ $service->product }}</li>
                                            </div>

                                            <div class="col-6">
                                                {{-- <a
                                                    href="{{ route('service_edit', ['id' => $service->id]) }}"><i
                                                        class="bi bi-pen text-success"
                                                        onclick="return confirm('Are you sure you want to delete this product?')"></i></a> --}}
                                                <a href="{{ route('service_destroy', ['id' => $service->id]) }}"><i
                                                        class="bi bi-x-lg text-danger"
                                                        onclick="return confirm('Are you sure you want to delete this product?')"></i></a>
                                            </div>

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
