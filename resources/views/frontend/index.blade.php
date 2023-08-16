<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Customer Registration Form</title>

    <link href="{{ asset('frontend/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('frontend/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">

  

    <link href="{{ asset('frontend/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('frontend/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet" media="all">
 
   
</head>
<?php
    function form_text($name, $title, $type='text', $variables=''){
?>
 <div class="form-row">
  <div class="name">{{$title}}</div>
  <div class="value">
    <div class="input-group">
      <input class="input--style-5" id="{{$name}}" name="{{$name}}"  type="{{$type}}" {{$variables}} autocomplete="none" value="{{ old($name) }}" required/>
    </div>
  </div>
</div>


<?php      
    }

    function form_select($name, $title, $options, $variables=''){
?>

<div class="form-row">
  <div class="name">{{$title}}</div>
  <div class="value">
    <div class="input-group">
      <div class="rs-select2 js-select-simple select--no-search">
        <select id="{{$name}}" name="{{$name}}" required>
          <option disabled="disabled" selected="selected"
            >{{$title}}</option
          >
          <?php foreach ($options as $key => $value): ?>
          <option value="<?= $value ?>"><?= $key ?></option>
      <?php endforeach; ?>
        </select>
        <div class="select-dropdown"></div>
      </div>
    </div>
  </div>
</div>



<?php 
}

function form_textarea($name, $title,  $variables=''){
?>

<div class="form-row">
  <div class="name">{{$title}}</div>
  <div class="value">
    <div class="input-group">
      <textarea id="{{$name}}" name="{{$name}}" class="input--style-5"   required>{{ old($name) }}</textarea>
    </div>
  </div>
</div>



<?php } ?>
<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Event Registration Form</h2>
                </div>
                <div class="card-body">
                  <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
                    <form action="{{ route('create_frontend_lead') }}" method="POST" class="form-validation pt-3"
                        id="registration-form">
                        @csrf

                            {{ form_text('date', 'Date', 'date') }}
                            
                            {{ form_text('first_name', 'First Name') }}
                            {{ form_text('last_name', 'Last Name') }}
                            {{ form_text('account_number', 'Account Number', 'number') }}
                            {{ form_text('phone', 'Contact Number', 'text', 'pattern=^\d{11}$ maxlength=11') }}

                            {{ form_text('email', 'Email') }}
                            {{ form_text('package', 'Package') }}
                            {{ form_select('status', 'Status', [
                                'Active' => 'active',
                                'Pending' => 'pending',
                                'Cancelled' => 'cancelled',
                                'Disconnected' => 'disconnected',
                            ]) }}
                            {{ form_text('address', 'Address') }}
                            {{ form_text('current_service_provider', 'Current Service Provider') }}

                            {{ form_text('service', 'Current Service') }}

                            {{-- {{form_select('lead_status', 'Lead Status',[
                                    'Open'=>'open',
                                    'Pending'=>'pending',
                                    'Closed'=>'closed',
                                    ])}} --}}
                            {{ form_text('issue', 'Issue') }}
                            {{ form_text('we_offer', 'We Offer') }}
                            {{ form_text('order_number', 'Order Number', 'number') }}
                            {{ form_text('order_confirmation_number', 'Order Confirmation Number', 'number') }}
                            {{ form_text('reference_number', 'Reference Number', 'number') }}
                            {{ form_text('monthly_bill', 'Monthly Bill', 'number') }}
                            {{ form_text('technician_date_and_time', 'Technician Date and Time', 'datetime-local') }}
                            {{ form_text('one_time_fee', 'One time Fee', 'number') }}
                            {{ form_text('security_passcode', 'Security Passcode', 'text') }}
                            {{ form_text('security_question', 'Security Question', 'text') }}
                            {{ form_textarea('comments', 'Comments') }}
                            {{ form_text('credit_check', 'Credit Check', 'text') }}
                            {{ form_text('mode_of_cc', 'Mode of CC', 'text') }}
                            {{ form_text('mode_of_payment', 'Mode of Payment', 'text') }}
                            {{ form_text('toll_free_number', 'Toll Free Number', 'phone') }}
                            {{ form_text('agent_name', 'Agent Name') }}
                            <input type="hidden" value="frontend_lead" name="user_name">







                        
                        <div class="col-12">

                            <button type="submit" class="btn btn--radius-2 btn--red">Submit</button>
                        </div>

                        <div id="alert-message" class="alert-message text-danger fw-bold my-2"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('frontend/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/datepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('frontend/js/global.js') }}"></script>

   

</body>

</html>
