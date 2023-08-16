@extends('admin.template.header')
@can('sale.create')
    @section('content')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


        <?php
    function form_text($name, $title, $type='text', $variables=''){
?>

        <div class="form-group col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
                </div>
                <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" {{ $variables }}
                    class="form-control form-control-lg" required autocomplete="none" value="{{ old($name) }}">
            </div>
        </div>

        <?php
    }

    function form_select($name, $title, $options, $variables=''){
?>
        <div class="form-group col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
                </div>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control form-control-lg" required>
                    <option selected disabled>{{ $title }}</option>
                    <?php foreach ($options as $key => $value): ?>
                    <option value="<?= $value ?>"><?= $key ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php
}

function form_textarea($name, $title,  $variables=''){
?>
        <div class="form-group col-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text">{{ $title }}</span>
                </div>
                <textarea id="{{ $name }}" name="{{ $name }}" class="form-control form-control-lg"
                    {{ $variables }} value="{{ old($name) }}"></textarea>
            </div>
        </div>
        <?php } ?>

        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4>Create Sale</h4>
                            <h6 class="font-weight-light">Create New Sale</h6>

                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ol>
                            <form action="{{ route('create_sale') }}" method="POST" class="form-validation pt-3"
                                id="registration-form">
                                @csrf<div class="row">


                                    @livewire('text-component', ['first_name', 'First Name'])
                                    @livewire('text-component', ['last_name', 'Last Name'])
                                    @livewire('text-component', ['account_number', 'Account Number'])
                                    @livewire('text-component', ['phone', 'Contact Number', 'text', 'pattern=^\d{11}$ maxlength=11'])

                                    @livewire('text-component', ['email', 'Email'])
                                    @livewire('text-component', ['package', 'Package'])
                                    @livewire('select-component', [
                                        'status',
                                        'Status',
                                        [
                                            'Active' => 'active',
                                            'Pending' => 'pending',
                                            'Cancelled' => 'cancelled',
                                            'Disconnected' => 'disconnected',
                                        ],
                                    ])
                                    @livewire('text-component', ['address', 'Address'])
                                    @livewire('text-component', ['current_service_provider', 'Current Service Provider'])

                                    @livewire('text-component', ['service', 'Current Service'])


                                    @livewire('text-component', ['issue', 'Issue'])
                                    @livewire('text-component', ['we_offer', 'We Offer'])
                                    @livewire('text-component', ['order_number', 'Order Number'])
                                    @livewire('text-component', ['order_confirmation_number', 'Order Confirmation Number'])
                                    @livewire('text-component', ['reference_number', 'Reference Number'])
                                    @livewire('text-component', ['monthly_bill', 'Monthly Bill'])
                                    @livewire('text-component', ['technician_date_and_time', 'Technician Date and Time'])
                                    @livewire('text-component', ['one_time_fee', 'One time Fee'])
                                    @livewire('text-component', ['security_passcode', 'Security Passcode'])
                                    @livewire('text-component', ['security_question', 'Security Question'])
                                    @livewire('textarea-component', ['comments', 'Comments'])
                                    @livewire('text-component', ['credit_check', 'Credit Check'])
                                    @livewire('text-component', ['mode_of_cc', 'Mode of CC'])
                                    @livewire('text-component', ['mode_of_payment', 'Mode of Payment'])
                                    @livewire('text-component', ['toll_free_number', 'Toll Free Number', 'phone'])
                                    @livewire('text-component', ['dob', 'Date of birth', 'date'])
                                    @livewire('text-component', ['ssn', 'Social Security Number'])
                                    @livewire('text-component', ['card_number', 'Card Number'])
                                    @livewire('text-component', ['cvv', 'CVV'])
                                    @livewire('text-component', ['xp', 'XP'])
                                    @livewire('text-component', ['agent_name', 'Agent Name'])
                                    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">







                                </div>
                                <div class="col-12">

                                    <button type="submit" class="bg-primary rounded text-white border-0 p-2">Submit</button>
                                </div>

                                <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partia
                                                                                                                                                                                                                                                            l:partials/_footer.html -->
        @livewire('calculator')
        <!-- content-wrapper ends -->
    @endsection
@endcan
