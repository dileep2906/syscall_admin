@extends('layouts/detachedLayoutMaster')

@section('title', 'Add Client')

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
                <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
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
                <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
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
                        <h4 class="card-title">Client Detail Form</h4>
                    </div>
                    <div class="card-body">
                        <!-- <form class="form add-client-form"> -->
                        <form class="form" action="{{ route('add-candidate-form') }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            {{-- <input type="hidden" name="created_by" value="{{Session::get('user')['email']}}"> --}}
                           
                            <div class="row">                                
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Client Name</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" placeholder="Client Name"
                                                name="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Email</label>
                                        <input type="email" id="email" class="form-control" name="email"
                                            placeholder="info@gmail.com" required />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Mobile</label>
                                        <input type="text" class="form-control" id="contact" name="contact"
                                            placeholder="Mobile" required />
                                       

                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Job</label>
                                        <input type="text" class="form-control" name="job"
                                            placeholder="Looking For Job " required />
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class=" text-center mb-1 col-12">
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

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

