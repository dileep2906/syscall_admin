@extends('layouts/detachedLayoutMaster')

@section('title', 'Employee List')

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

@endsection

@section('content')
<!-- users list start -->

@if (Session::has('message'))
<div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
  <div class="toast toast-autohide-success show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
    <div class="toast-header bg-success text-white">
      <strong class="me-auto">Success</strong>
      <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body bg-success text-white">
     {{ Session::get('message') }}
   </div>
 </div>
</div>
@endif

  <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
          <div class="toast toast-autohide-success " role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
            <div class="toast-header bg-success text-white">
              <strong class="me-auto">Success</strong>
              <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-success text-white">
                Referral link is Copied to Clipboard
            </div>
          </div>

        </div>


{{-- @endphp --}}
<div class="row">
<div class="card">

  <div class="card-body border-bottom">
    <div class="row">
      <button type="button" onclick="location.href = 'admin/employee/add';" class="btn btn-primary col-md-2">Add Employee</button>
    </div>
  </div>

  <div class="card-datatable table-responsive">
    <table class="user-list-tables table">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Profile Photo</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Joining Date</th>
          <th>Return's Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($employees as $employee)
        <tr>
          <th scope="row">{{ $loop->index+1 }}</th>
          <th>
            <img src="{{asset('user_profile/'.$employee->user_profile)}}" class="img-circle" height="100" width="100" alt="avatar">      
           
          </th>
          <td>{{ $employee->name }}</td>
          <td>{{ $employee->email }}</td>
          <td>{{ $employee->contact }}</td>
          <td>{{ $employee->doj }}</td>
          <td><form method="POST" action="{{route('update-employee')}}">@csrf<button class="btn btn-primary btn-sm" name="employeeId" value= "{{$employee->id}}" type="Submit"><span>Edit</span></button></form>
            {{-- <a href="admin/employee/update/{{ $employee->id }}" class="btn btn-primary btn-sm" style="margin:5px">Edit</a> --}}
            <a href="admin/employee/delete/{{ $employee->id }}" class="btn btn-danger show-alert-delete-box btn-sm"  onclick="return myFunction();">Delete</a>
          </td>

        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
    <div class="toast toast-autohide-success hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
      <div class="toast-header bg-success text-white">
        <strong class="me-auto">Success</strong>
        <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body bg-success text-white">
        Client Is Added Successfully
      </div>
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
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
<script>
  function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // IE specific code path to prevent textarea being shown while dialog is visible.
        return clipboardData.setData("Text", text);

    } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
             var autoHideToastSuccess = document.querySelector('.toast-autohide-success');

            var showAutoHideToastSuccess = new bootstrap.Toast(autoHideToastSuccess, {
              autohide: true
            });

            showAutoHideToastSuccess.show();
            return document.execCommand("copy");  // Security exception may be thrown by some browsers.
        } catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return false;
        } finally {
            document.body.removeChild(textarea);
        }
    }
}


</script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>


<script type="text/javascript">

  $('.show-alert-delete-box').click(function(event){
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
      title: "Are you sure you want to delete this record?",
      text: "If you delete this, it will be gone forever.",
      icon: "warning",
      type: "warning",
      buttons: ["Cancel","Yes!"],
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((willDelete) => {
      if (willDelete) {
        form.submit();
      }
    });
  });
</script>
<script>
  jQuery(document).ready(function( $ ){

    $(".user-list-tables").on("click", ".form-check-input", function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var value = $(this).data('test');
      getRow(id,value);
    });

  });

  function getRow(id,value){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'POST',
      url: 'api/client_setting',
      data: {id:id,value:value},
      dataType: 'json',
      success: function(response){
        console.log(response);
        if(response.status == 200)
        {

            // Auto Hide Toast

            var autoHideToastSuccess = document.querySelector('.toast-autohide-success');
            // $('.toast-autohide-error .toast-body').html(response.error);
            $('.toast-autohide-success .toast-body').html(response.message);

            var showAutoHideToastSuccess = new bootstrap.Toast(autoHideToastSuccess, {
              autohide: true
            });

            showAutoHideToastSuccess.show();
            window.location = 'products';

          }
        }
      });
  }
</script>

<script>
    function myFunction() {
        if (!confirm("Are You Sure to delete this"))
            event.preventDefault();
    }
</script>
