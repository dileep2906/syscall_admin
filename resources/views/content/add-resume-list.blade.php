@extends('layouts/detachedLayoutMaster')

@section('title', 'Add New Resume')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
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
                    {{-- <div class="card-header">
                        <h4 class="card-title">Customer Detail Form</h4>
                    </div> --}}
                    <div class="card-body">
                        <!-- <form class="form add-client-form"> -->

                            {{-- <input type="hidden" name="created_by" value="{{Session::get('user')['email']}}"> --}}
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <h3 class="submit-property__headline">Resume Uploade </h3>

                                        <div class="panel-body card-body">

                                            <img id="preview-image" width="300px">



                                            <form class="form" action="{{ route('add-uploadresume') }}" enctype="multipart/form-data" id="image-upload" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label" for="inputImage">Resume:</label>
                                                    <input type="file" name="files" id="file"
                                                    onchange="return fileValidation()" class="form-control" required><span class="text-danger" id="fileError" ></span>
                                                </div>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-success">Upload Resume</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<script type="text/javascript">
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

    function fileValidation() {
            var fileInput =
                document.getElementById('file');

            var filePath = fileInput.value;

            // Allowing file type
            var allowedExtensions = /(\.doc|\.docx|\.odt|\.pdf|\.tex|\.txt|\.rtf|\.wps|\.wks|\.wpd)$/i;

            if (!allowedExtensions.exec(filePath)) {
                // alert('Invalid file type');
                $("#fileError").html("Only PDF , DOCS , TXT File Allowed.");

                fileInput.value = '';
                return false;
            }
        }
</script>
