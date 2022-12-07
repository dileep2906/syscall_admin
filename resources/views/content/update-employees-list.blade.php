@extends('layouts/detachedLayoutMaster')

@section('title', 'Update Employees Details')

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


    <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
        <div class="toast toast-autohide-success hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-autohide="false">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Success</strong>
                <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-success text-white">
                User Is Added Successfully
            </div>
        </div>

    </div>

    <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
        <div class="toast toast-autohide-error hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-autohide="false">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Error</strong>
                <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-danger text-white">
                Username Is not Added
            </div>
        </div>

    </div>

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
    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Employees Detail Form</h4>
                    </div>
                    <div class="card-body">
                        <!-- <form class="form add-client-form"> -->
                        <form class="form" action="/update-employee-form/{{ $employees->id }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')

                            @isset($client)
                            <input type="hidden" name="candidate_id" value="{{$client->id}}">
                            @endisset
                            {{-- <input type="hidden" name="id" value=" {{ $companys->id }}"> --}}
                            {{-- <input type="hidden" name="created_by" value="{{Session::get('user')['email']}}"> --}}
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Employees Name</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" placeholder="Customer Name"
                                                value={{ $employees->name }} name="name" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Email</label>
                                        <input type="text" id="country-floating" class="form-control"
                                            value={{ $employees->email }} name="email" placeholder="Product code" required
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Password</label>
                                        <input type="password" id="country-floating" class="form-control"
                                            name="password" value={{ $employees->password }} placeholder="Password" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Mobile</label>
                                        <input type="text" class="form-control" name="contact" value={{ $employees->contact }}
                                            placeholder="Mobile" required autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Date Of Joining</label>
                                        <input type="text" class="form-control" id="datepicker"  value="{{ $employees->doj }} " name="doj"
                                          required  />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Profile Photo</label>
                                        <input type="file" class="form-control"  name="user_profile" />

                                    </div>
                                    <img  src="{{asset('user_profile/'.$employees->user_profile)}}"   alt="your image" style="display: block; height: 100px; width: 100px;">

                                </div>
                                

                                <div class=" text-center mt-10  pt-10 col-12 mt-1">
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
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width('100%')
                    .height(200);
            };
            document.getElementById('blah').style.display = 'block';

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function() {



        var scntDiv = $('#uploadGuestDetails');
        var i = $('#uploadGuestDetails tr td').length + 1;
        var max = 5;


        $(document).on('click', '#uploadMoreGuestDetails', function() {

            if (i <= 51) {
                $('<tr><td> <input type="text" class="form-control" name="guest_name[]" required autocomplete="off"/></td><td> <input type="text" class="form-control" name="guest_number[]" required autocomplete="off"/></td><td>   <img id="plan' +
                    i +
                    '" src="#" alt="your image" /  style="display:none;height:200px;width:200px;"><input type="file" id="plan" name="guest_idcard[]" data-id=' +
                    i +
                    ' accept=".jpg,.jpeg,.png,.gif"  ></td><td><a href="#" class="removeUploadPlan" width="150px" style="text-align: center">Remove</a></td></tr>'
                ).insertBefore($('#uploadSubmissionGuestDetails'));


                i++;
            } else {
                alert('Maximum Plan Upload Limit is 50');
            }

            return false;
        });

        $(document).on('click', '.removeUploadPlan', function() {
            if (i > 1) {
                $(this).parents('tr').remove();
                i--;
            }
            return false;
        });


        $(document).on('change', '#plan', function() {

            var _id = $(this).attr('data-id');
            document.getElementById('plan' + _id + '').src = window.URL.createObjectURL(this.files[0])
            document.getElementById('plan' + _id + '').style.display = "block";
        });
    });
</script>
