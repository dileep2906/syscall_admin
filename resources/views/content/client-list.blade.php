

@extends('layouts/detachedLayoutMaster')

@section('title', 'Candidate List')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css"
        integrity="sha384-eoTu3+HydHRBIjnCVwsFyCpUDZHZSFKEJD0mc3ZqSBSb6YhZzRHeiomAUWCstIWo" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css"
        integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
@endsection

@section('content')
    <!-- users list start -->

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

    @if (Session::has('import_error'))
    <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
        <div class="toast toast-autohide-success show" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-autohide="false">
            <div class="toast-header bg-info text-white">
                <strong class="me-auto">Error</strong>
                <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body bg-danger text-white">
                @foreach (Session::get('import_error') as $failure)
                {{  $failure->errors() [0]}} at line number - {{  $failure->row() }}<br>
                @endforeach
            </div>
        </div>
    </div>
@endif

    <div class="card">

        <div class="card-body border-bottom">
            <div class="row">
                <div class="col-md-1" style="width: 14%;margin-left: -1%;">
                    <button type="button" onclick="location.href = 'admin/client/add';" class="btn btn-primary">Add New</button>
                </div>
                <div class="col-md-4"  style="width:25%;margin-left: -1%;">
                    <form method="POST">
                        @method('POST')
                        @csrf
                        <select class="form-select select2" name="user_name" id="user_name">
                            <option selected>Select Employee Name</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                </div>
                <div class="col-md-2"  style="width: 12%;margin-left: -1%;">
                    <button type="submit" id="user_add" class="btn btn-primary">Update</button>
                </div>
                </form>
                <div class="col-md-4"  style="width: 35%;    margin-left: -1%;">
                    <form class="form" action="{{ route('add-uploadexcelfile') }}" enctype="multipart/form-data"
                        id="image-upload" method="POST">
                        @csrf
                        <input type="file" name="excel_file" id="inputImage"class="form-control">
                        @error('excel_file')
                <span class="text-danger">{{ $message }}</span>

                @enderror
                </div>
                        <div class="col-md-2" style="    width: 15%; margin-left: -2%;">
                        <button type="submit" class="btn btn-primary">Upload File</button>
                    </form>
                </div>

              

            </div>

            <div class="card-datatable table-responsive">
                <table class="user-list-tables table" style="text-align: center">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            {{-- <th> Intrest</th> --}}
                            <th>Added By</th>
                            <th>Status</th>
                            <th>WhatsApp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
{{-- {{dd($candidate)}} --}}
                        @foreach ($client as $client)
                            <tr>
                                <th scope="row"><input type="checkbox" name="candidate_id" value="{{ $client->id }}"
                                        class="candidate_checkbox"></th>
                                <td>{{ $client->name }}</form>
                                    {{-- <a href="candidate/add/{{ $candidate->id }}">{{ $candidate->name }}</a> --}}
                                </td>
                                <td><a href="mailto:{{ $client->email }}">{{ $client->email }}</a></td>
                                <td><a href="tel:{{ $client->number }}">{{ $client->number }}</a></td>
                                 {{-- <td>{{ $client->job }}</td> --}}
                                <td>{{ $client->emp_name }}</td>
                                <td>{{ $client->status }}</td>
                               
                                <td>
                                    <a href="https://api.whatsapp.com/send?phone={{ $client->number }}&text=hello"
                                        class="float" target="_blank">
                                        <i class="bi bi-whatsapp" style='color:#8cca8d ; font-size:30px'></i>
                                </td>

                                <td><form method="POST" action="{{route('client-update')}}">@csrf<button class="btn btn-primary btn-sm" name="candidateId" value= "{{$client->id}}" type="Submit"><span>Edit</span></button></form>

                                    <a href="admin/candidate/delete/{{ $client->id }}"
                                        class="btn btn-danger btn-sm" onclick="return myFunction();" >Delete</a>

                                </td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
                <div class="toast toast-autohide-success hide" role="alert" aria-live="assertive" aria-atomic="true"
                    data-bs-autohide="false">
                    <div class="toast-header bg-success text-white">
                        <strong class="me-auto">Success</strong>
                        <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-success text-white">
                        Client Is Added Successfully
                    </div>
                </div>

            </div>

        </div>
        <!-- list and filter end -->
        </section>
        <!-- users list ends -->
    @endsection

    @section('vendor-script')
        {{-- Vendor js files --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

        <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
    @endsection

    @section('page-script')
        {{-- Page js files --}}
        <script src="{{ asset(mix('js/scripts/pages/app-product-list.js')) }}"></script>
    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>


    <script type="text/javascript">

$(document).ready(function() {
        $(document).ready(function() {
          $('.select2').select2();
      });

    });

        $(document).ready(function() {
            $("#user_add").on('click', function(e) {
                e.preventDefault();
                var name = $("#user_name").val();

                var candidate = [];
                $(".candidate_checkbox").each(function() {
                    if ($(this).is(":checked")) {
                        candidate.push($(this).val());
                    }
                });
                candidate = candidate.toString(); // toString function convert array to string
                // console.log(candidate)
                // console.log(name)
                let _token = $('meta[name="csrf-token"]').attr('content');
                var ajax_url = "{{ route('clientAdd') }}";
                if (name !== "" && candidate.length > 0) {


                $.ajax({
                    url: ajax_url,
                    type: "POST",
                    cache: false,
                    dataType: "json",
                    data: {
                        _token: _token,
                        'name': name,
                        'candidate': candidate
                    },
                    success: function(data) {
                        window.location.reload(true);
                        // console.log(data)
                        if (data > 0) {
                            window.location.reload();
                            $("#user_add").trigger("reset");
                            alert("Data insert in database successfully");
                        }


                    }
                });
                } else {
                    alert("Fill the required fields");
                }
            });
        });
    </script>


    <script>
        jQuery(document).ready(function($) {

            $(".user-list-tables").on("click", ".form-check-input", function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var value = $(this).data('test');
                getRow(id, value);
            });

        });

        function getRow(id, value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({


            });
        }


    </script>

<script>
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
   </script>
