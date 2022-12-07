@extends('layouts/detachedLayoutMaster')

@section('title', 'Add Employee')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link
      href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css"
      rel="stylesheet"
    />
@endsection

@section('content')

    @if (Session::has('message'))
        <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
            <div class="toast toast-autohide-success show" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-autohide="false">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body bg-success text-white">
                    {{ Session::get('message') }}

                </div>
            </div>

        </div>
    @endif
    @if (Session::has('error'))
        <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
            <div class="toast toast-autohide-error show" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-autohide="false">
                <div class="toast-header bg-danger text-white">
                    <strong class="me-auto">Error</strong>
                    <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body bg-danger text-white">
                    {{ Session::get('error') }}

                </div>
            </div>

        </div>
    @endif
    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Employee Detail Form</h4>
                    </div>
                    <div class="card-body">
                        <!-- <form class="form add-client-form"> -->
                        <form class="form" action="{{ route('add-employee-form') }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            {{-- <input type="hidden" name="created_by" value="{{Session::get('user')['email']}}"> --}}
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Employee Name</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" placeholder="Employee Name"
                                                name="name" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Email</label>
                                        <input type="email"  class="form-control" name="email"
                                        placeholder="info@gmail.com"  autocomplete="off" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        {{-- <input type="email" id="country-floating" class="form-control"
                                            name="email" placeholder="info@gmial.com" required autocomplete="off" /> --}}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Profile Photo</label>
                                        <input type="file" class="form-control"  name="user_profile"
                                          required  />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Password</label>
                                        <input type="password" id="country-floating" class="form-control"
                                            name="password" placeholder="Password "  autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Mobile</label>
                                        <input type="text" class="form-control"  name="contact"
                                            placeholder="Mobile"  autocomplete="off" />
                                            <span id="lblError" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Date Of Joining</label>
                                        <input type="text" class="form-control" id="datepicker" placeholder="mm/dd/yyyy" name="doj"
                                            />
                                    </div>
                                </div>
                                
                                

                                <div class=" text-center mt-10  pt-10 col-12">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Floating Label Form section end -->
@endsection

@section('vendor-script')
    <!-- vendor files -->

    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    {{-- <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script> --}}

@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
    integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<script type="text/javascript">

        $(document).ready(function() {
          $('.js-example-basic-single').select2();
      });


 </script>
<script type="text/javascript">
        $(function () {
        $('#datepicker').datepicker();
        // $('#datepicker').datepicker('show');
        });
    $(function () {
        $("#txtName").keypress(function (e) {
            var keyCode = e.keyCode || e.which;

            $("#lblError").html("");

            //Regex for Valid Characters i.e. Numbers.
            var regex = /^[0-9]+$/;

            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lblError").html("Only Numbers allowed.");
            }
            return isValid;
        });
    });

    $(function () {
        $("#txAdhar").keypress(function (e) {
            var keyCode = e.keyCode || e.which;

            $("#lbladharError").html("");

            //Regex for Valid Characters i.e. Numbers.
            var regex = /^[0-9]+$/;

            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lbladharError").html(" Numbers Should Be 12 Digit.");
            }
            return isValid;
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // alert("No")
        var startTimer;
        $('#email').on('keyup', function () {
            clearTimeout(startTimer);
            let email = $(this).val();
            startTimer = setTimeout(checkEmail, 500, email);
        });
        $('#email').on('keydown', function () {
            clearTimeout(startTimer);
        });
        function checkEmail(email) {
            $('#email-error').remove();
            if (email.length > 1) {
                $.ajax({
                    type: 'post',
                    url: "{{ route('checkEmail') }}",
                    data: {
                        email: email,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success == false) {
                            $('#email').after('<div id="email-error" class="text-danger" <strong>'+data.message[0]+'<strong></div>');
                        } else {
                            $('#email').after('<div id="email-error" class="text-success" <strong>'+data.message+'<strong></div>');
                        }

                    }
                });
            } else {
                $('#email').after('<div id="email-error" class="text-danger" <strong>Email address can not be empty.<strong></div>');
            }
        }

    });
</script>
