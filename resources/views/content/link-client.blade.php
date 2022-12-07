@extends('layouts/detachedLayoutMaster')

@section('title', 'Link Employee to Clients')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')

<!-- Select2 Start  -->
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
<section class="basic-select2">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Link Employees with Clients Form</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <!-- Basic -->
            <form method="POST" action="{{route('link_client')}}">
            @csrf
            <input type="hidden" name="created_by" value="{{Session::get('user')['email']}}">
            <input type="hidden" name="account_id" value="{{Session::get('user')['account_id']}}">

            <div class="col-md-6 mb-1">
              <label class="form-label" for="select2-basic">List of Employees</label>
              <select class="select2 select2-size-lg form-select" name="employee" id="select2-basic">
              @php
                  $users = DB::table('users')->where('is_active',1)->where('user_role','EMPLOYEE')->get();
                  foreach($users as $row) {
              @endphp
                <option value="{{$row->id}}">{{$row->name}}</option>
                @php
                  }
                @endphp
              </select>
            </div>

            <!-- Multiple -->
            <div class="col-md-6 mb-1">
              <label class="form-label" for="select2-multiple">List of Clients</label>
              <select class="select2 select2-size-lg form-select" name="clients[]" id="select2-multiple" multiple>
                  <!-- ->whereNotIn('id', DB::table('client_employee')->select('client_id')->get()->toArray()) -->
                  <!-- $users = DB::table('clients')->where('is_active',1)->get(); -->
              @php
                  $users =DB::select('select * from clients where is_active = 1 and id NOT IN (select client_id from client_employee)');
                  foreach($users as $row) {
              @endphp
                <option value="{{$row->id}}">{{$row->name}}</option>
                @php
                  }
                @endphp
              </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Select2 End -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection
