@extends('admin.template.header')
@can('lead.update')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />



        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4>Lead Edit!</h4>
                            <h6 class="font-weight-light">Edit This Lead</h6>

                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <div id="alert-message" class="alert-message text-danger fw-bold my-2">
                                            {{ $error }}</div>
                                    </li>
                                @endforeach
                            </ol>


                <x-lead-edit-form :lead="$lead" :categories="$categories" :services="$services" :products="$products" />



                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script>
  document.addEventListener('DOMContentLoaded', function () {
    var inputElements = document.querySelectorAll('input');
    var selectElements = document.querySelectorAll('select');

    inputElements.forEach(function (inputElement) {
      if (inputElement.value.trim() !== '') {
        inputElement.classList.add('is-valid');

      }
    });

    selectElements.forEach(function (selectElement) {
      if (selectElement.value.trim() !== '' && selectElement.value.trim() !== 'Call Dispose') {
        selectElement.classList.add('is-valid');

      }
    });

    // Add 'is-valid' class to the input fields and select elements when they have a value
    document.addEventListener('input', function (event) {
      if (event.target.tagName === 'INPUT' || event.target.tagName === 'SELECT') {
        var inputElement = event.target;
        if (inputElement.value.trim() !== '') {
          inputElement.classList.add('is-valid');

        } else {
          inputElement.classList.remove('is-valid');

        }
      }
    });
  });
</script>


        @livewire('calculator')
    @endsection
@endcan
