@extends('layouts/detachedLayoutMaster')

@section('title', 'Candidate Details')
@include('layouts/frontend/header')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">

    <style>
        .box {
            display: none;
        }

        .ofv {
            display: none;
        }

        .sel {
            display: none;
        }

        .areaofintrest {
            color: #0e0e0e;
            font-size: 18px;
            font-style: italic;
        }
    </style>

@endsection

@section('content')

    <section class="company-section pt-100 pb-70">
        <div class="container">
            @foreach ($candidate as $candidate)

            <div class="row col-md-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="d-flex justify-content-start">
                        <div class="p-2 flex-fill">
                            <h2 style="color:#0e0e0e;"><strong style="text-transform: uppercase;">{{ $candidate->name }}</strong></h2>
                            <h3 style="margin-left: 10px;text-transform: uppercase;">Job :- {{ $candidate->job }} </h3>

                            <span class="areaofintrest">Area Of Intrest :
                                <strong>{{ $candidate->areaofintrest }}</strong></span>
                        </div>
                    </div>


                    <div class="d-flex justify-content-evenly">
                        <h3 style="margin-left: 10px;text-transform: uppercase;"> <img src={{ asset('uploads/icons8-skill-64.png') }} style="width: 30px;"> Skill - {{ $candidate->skill }} </h3>
                        <h3 style="margin-left: 10px;text-transform: uppercase;"><img src={{ asset('uploads/icons8-education-64.png') }}  style="width: 35px;">
                            Education -   {{ $candidate->education }}</h3>
                        <h3>Added By :<strong style="color:#b9812d; text-transform: uppercase;"> {{ $candidate->emp_name }}</strong></h3>
                    </div>

                    <div class="d-flex justify-content-end m-1 p-0">
                        <button class="btn btn-outline-success btn-sm" style="margin-right: 10px;height: 45px;width: 180px;">
                            <h4><a href="tel:{{ $candidate->number }}"><img src={{ asset('uploads/icons8-sms-80.png') }} style="width: 30px;"> Send SMS</a></h4>
                        </button>
                        <button class="btn btn-outline-secondary btn-sm"
                        style="margin-right: 10px; height: 45px;width: 180px;">
                        <h4><a href="mailto:{{ $candidate->email }}"><i class="fa fa-envelope" aria-hidden="true"></i>
                              Send Email </a></h4>
                    </button>
                    <button class="btn btn-outline-success btn-sm" style="margin-right: 10px;height: 45px;width: 180px;">
                        <h4><img src={{ asset('uploads/icons8-whatsapp-48.png') }} style="width: 30px;">  <a href="https://api.whatsapp.com/send?phone={{ $candidate->number }}" style="color:rgb(42, 163, 92);">WhatsApp</a></h4>
                    </button>
                        <button class="btn btn-outline-success btn-sm" style="margin-right: 10px;height: 45px;width: 180px;">
                            <h4><img src={{ asset('uploads/icons8-calling-16.png') }} style="width: 30px;">  <a href="tel:{{ $candidate->number }}" style="color:rgb(192, 118, 49)">Make A Call </a></h4>
                        </button>
                        <form method="POST" action="{{route('candidate-profile')}}">
                            @csrf
                            <button class="btn btn-outline-info btn-sm" style="margin-right: 10px;height: 45px;width: 180px;" name="id"  value= "{{$candidate->id}}" type="Submit">
                                <h4><img src={{ asset('uploads/icons8-person-24.png') }} style="width: 30px;">   View Profile</h4>
                            </button>

                        </form>

                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-info btn-md user_dialog col-md-2 mt-0 m-1"
                           data-bs-toggle="modal" data-id="{{ $candidate->id }}"
                           data-bs-target="#exampleModal">
                          Add Follow UP
                       </button>
                   </div>

                </div>
            </div>



            @endforeach


            <!-- Modal -->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content" style="height:100%;">
                        <div class="modal-header">
                    <h5 class="modal-title">Add Follow UP Data For Organisation <strong  id="organisation"></strong></h5>


                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form" action="{{ route('add-lead-form') }}" enctype="multipart/form-data"
                                method="POST">
                                @method('post')
                                @csrf
                                {{-- <input type="hidden" name="created_by" value="{{Session::get('user')['email']}}"> --}}

                                <input type="hidden" name="candidate_id" id="id" value="{{ $candidate->id }}">
                                <input type="hidden" name="name" id="name" value="{{ $candidate->name }}">
                                <input type="hidden" name="email" id="email" value="{{ $candidate->email }}">
                                <input type="hidden" name="number" id="number" value="{{ $candidate->number }}">

                                <div class="row">
                                    <div class="col-md-6 col-12 mb-1">
                                        <label class="form-check-label">
                                            Status :
                                        </label>
                                        <select class="form-select status select2" aria-label="Default select example" name="status" required>
                                            <option value=" ">Select Status</option>
                                            <option value="Contact">Contact</option>
                                            <option value="Not_Contact">Not Contact</option>
                                            {{-- <option value="Not_Answerd">Not Answerd</option> --}}
                                            <option value="Call_Back">Call Back</option>
                                        </select>
                                    </div>

                                    {{-- start approve div  for interview --}}
                                    <div class="Contact box">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-1">
                                                <label class="form-check-label">
                                                    Schedule Interview:
                                                </label>
                                                <select class="form-select schudle select2 mb-1" aria-label="Default select example"
                                                    name="schedule">
                                                    <option value=" ">Select Mode</option>
                                                    <option value="company_office">Company Visit</option>
                                                    <option value="recruiter_office">Office Visit</option>
                                                    <option value="Online">Online</option>
                                                </select>
                                            </div>

                                            {{-- Office Visit interview div --}}

                                            <div class="company_office ofv">
                                                <div class="row">

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-check-label">
                                                            Company Name :
                                                        </label>
                                                        <select class="form-select select2" aria-label="Default select example" id="companyName"
                                                            name="company_name">
                                                            <option value=" ">Company Names </option>
                                                            {{-- {{ dd($companies) }} --}}
                                                            @foreach ($companies as $company )
                                                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <input type="hidden" id="vacancy_id_" class="form-control"
                                                    name="vacancy_id" placeholder="Vacancy Id" readonly/>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-check-label">
                                                            Select Vertical
                                                        </label>
                                                        <select id="vartical_name_" name="vartical_name"
                                                            class="form-control select2">
                                                            <option value=" ">Select Vertical</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-check-label">
                                                            Select Designation
                                                        </label>
                                                        <select id="designation_name_" name="designation_name"
                                                            class="form-control select2">
                                                            <option value=" ">Select Designation</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-check-label">
                                                            Position Name
                                                        </label>
                                                        <select id="position_name_" name="position_name"
                                                            class="form-control select2">
                                                            <option value=" ">Select Position </option>
                                                        </select>
                                                    </div>


                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-check-label">
                                                            Select Branch Location
                                                        </label>
                                                        <select id="sub-location" name="branch_location"
                                                            class="form-control select2">
                                                            <option value=" ">Select Branch Location</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label" for="country-floating">Company Visit
                                                            Date</label>
                                                        <input type="text" id="basicDate"  class="form-control"
                                                            name="company_visit_date"  />
                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label" for="country-floating">Remark </label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="company_remark"
                                                            autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="recruiter_office ofv">
                                                <div class="row">

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-check-label">
                                                            Office Name :
                                                        </label>
                                                        <select class="form-control select2" id="recruiterName" aria-label="Default select example"
                                                            name="recruiter_name">
                                                            <option>Office Names </option>
                                                            @foreach ($recruiters as $recruiter )
                                                            <option value="{{ $recruiter->id }}">{{ $recruiter->recuiter_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-check-label">
                                                            Select Branch Location
                                                        </label>
                                                        <select id="recruiterBranch" name="recruiter_branch" class="form-control select2">
                                                            <option value=" ">Select Branch </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label" for="country-floating">Office Visit
                                                            Date</label>
                                                        <input type="text" id="basicDate1" class="form-control"
                                                            name="recruiter_visit_date"  />
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-check-label">
                                                            Designation Name :
                                                        </label>
                                                        <select class="form-select select2" aria-label="Default select example"
                                                            name="recruiter_designation">
                                                            <option>Designation Names </option>
                                                            @foreach ($designations as $designation)
                                                            <option value="{{ $designation->designation_name }}">{{ $designation->designation_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label" for="country-floating">Remark </label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="recruiter_remark"
                                                            autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- online mode interview div --}}
                                            <div class="Online ofv">
                                                <div class="row">

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-check-label">
                                                            Company Name :
                                                        </label>
                                                        <select class="form-select select2" aria-label="Default select example"
                                                            name="int_com_name">
                                                            <option>Company Names </option>
                                                            @foreach ($companies as $company )
                                                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-check-label">
                                                            Designation Name :
                                                        </label>
                                                        <select class="form-select select2" aria-label="Default select example"
                                                        name="int_des_name">
                                                        <option>Designation Names </option>
                                                        @foreach ($designations as $designation)
                                                        <option value="{{ $designation->designation_name }}">{{ $designation->designation_name }}</option>
                                                        @endforeach
                                                    </select>

                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label" for="country-floating">Online Interview Date
                                                        </label>
                                                        <input type="text" id="basicDate2" class="form-control"
                                                            name="int_des_date" placeholder="Date Select" />
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1 ">
                                                        <label class="form-label" for="country-floating">Remark </label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="int_remark"  />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- end approved div --}}

                                    {{-- start not approved div --}}

                                    <div class="Not_Contact box">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-1">
                                                <label class="form-check-label">
                                                    Response :
                                                </label>
                                                <select class="form-select select2" aria-label="Default select example" name="not_contact">
                                                    <option> </option>
                                                    <option value="Ringing">Ringing</option>
                                                    <option value="Switch Off">Switch Off</option>
                                                    <option value="Not Reachable">Not Reachable</option>
                                                    <option value="Wrong Number">Wrong Number</option>
                                                </select>
                                            </div>
                                            {{-- <div class="col-md-6 col-12 mb-1">
                                                <label class="form-label" for="country-floating">Not Contact Remark</label>
                                                <input type="text" id="country-floating" class="form-control" name="not_intrest"  />
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-1 Not_Answerd box">
                                        <label class="form-label" for="country-floating">Not Answer </label>
                                        <input type="text" id="country-floating" class="form-control" name="not_answer"
                                             />
                                    </div>
                                    <div class="col-md-6 col-12 mb-1 Not_Answerd box">
                                        <label class="form-label" for="country-floating">Not Answer
                                            Date</label>
                                        <input type="datetime-local" id="country-floating" class="form-control"
                                            name="not_answer_date"  />
                                    </div>
                                    <div class="col-md-6 col-12 mb-1 Call_Back box">
                                        <label class="form-label" for="country-floating">Call Back Remark</label>
                                        <input type="text" id="country-floating" class="form-control" name="call_back"
                                             />
                                    </div>
                                    <div class="col-md-6 col-12 mb-1 Call_Back box">
                                        <label class="form-label" for="country-floating">Call Back
                                            Date</label>
                                        <input type="text"  id="basicDate3" class="form-control"
                                            name="call_back_date"  />
                                    </div>
                                    <div class="col-md-6 col-12 mb-1 Wrong_Number box">
                                        <label class="form-label" for="country-floating">Wrong Number </label>
                                        <input type="text" id="country-floating" class="form-control" name="wrong_no"
                                             />
                                    </div>

                                    {{-- end not approved div --}}

                                    <div class=" text-center mt-2  pt-10 col-12">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>

                            </form>
                        </div>
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div> --}}
                    </div>
                </div>
            </div>
            <!--End  Modal -->

    </section>

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

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {

        $("#basicDate").flatpickr({
                  enableTime: true,
                dateFormat: "Y-m-d H:i",
            });

            $("#basicDate1").flatpickr({
                  enableTime: true,
                dateFormat: "Y-m-d H:i",
            });

            $("#basicDate2").flatpickr({
                  enableTime: true,
                dateFormat: "Y-m-d H:i",
            });

            $("#basicDate3").flatpickr({
                  enableTime: true,
                dateFormat: "Y-m-d H:i",
            });
        $(".status").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".box").hide();
                }
            });
        }).change();
    });

    $(document).ready(function() {
        $(".schudle").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".ofv").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".ofv").hide();
                }
            });
        }).change();
    });


    //Start Online Mode Interview select locations



    $(document).ready(function() {
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $('#companyName').on('change', function() {
            var idcompany = this.value;
            // alert(idCompany)
            $("#sub-location").html('');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ Route('fetch-location-apply') }}",
                type: "POST",
                data: {
                    location_id: idcompany,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {

                    // $('#candidateName').html('<option value="">Select State</option>');
                    $.each(result.states, function(key, value) {

                        $("#designation_name_").append('<option value="' + value
                            .desID + '">' + value.designation_name + '</option>');

                        $("#position_name_").append('<option value="' + value
                            .posID + '">' + value.position_name + '</option>');

                        $("#vartical_name_").append('<option value="' + value
                            .vertID + '">' + value.vartical_name + '</option>');
                        $("#sub-location").append('<option value="' + value
                            .pincode_id + '">' + value.location_name + '</option>');

                        // console.log(value.vartical_name);
                        // console.log(value.number);

                    });

                }
            });
        } );

        $('#recruiterName').on('change', function() {
            var idRecruiter = this.value;
            // alert(idRecruiter)
            // $("#sub-location").html('');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ Route('fetch-recruiter-branch') }}",
                type: "POST",
                data: {
                    recruiter_id: idRecruiter,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {

                    $('#recruiterBranch').html('<option value="">Select Branch Location</option>');
                    $.each(result.recruiterBranch, function(key, value) {
                        console.log(value);
                        $("#recruiterBranch").append('<option value="' + value
                            .branch_name + '">' + value.branch_name + '</option>');
                    });

                }
            });
        } );





    });

    //end Online Mode Interview select locations

    // compony visit select locations
    $(document).ready(function() {
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });



    });

    //End compony visit select locations



    $(document).on("click", ".user_dialog", function() {
        var UserName = $(this).data('id');
        // alert(UserName)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ Route('fetch-candidate') }}",
            type: "POST",
            data: {
                location_id: UserName,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(result) {

                $('#sub-location').html('<option value="">Select State</option>');
                $.each(result.candidate, function(key, value) {
                    $('#organisation').text(value.organisation);
                    $("#id").val(value.id);
                    $("#name").val(value.name);
                    $("#email").val(value.email);
                    $("#number").val(value.number);
                    // $("#country_online_").val(value.quantity);
                    console.log(value);

                });

            }
        });
        $(".modal-body #user_name").val(UserName);
    });
</script>
