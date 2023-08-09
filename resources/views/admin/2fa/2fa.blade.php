@extends('admin.layouts.main')

@section('title', 'Two Factor Enable')
@section('User_details','active')

@section('content')

<!-- 2fagoogle -->
<form method="POST" action="{{ route('verify2fa') }}">
  @csrf

  <div class="form-row">
    <div class="form-group col-sm-4">
      <p><b>One Time Password:</b></p>
    </div>
    <div class="form-group col-sm-8">
      <input type="password" class="form-control" name="one_time_password" id="one_time_password" required>
    </div>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary pull-left" name="button">Proceed</button>
  </div>
</form>



@endsection


@section('extra_scripts')
      <!-- Page level plugins -->
      <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  
      <!-- Page level custom scripts -->
      <script src="{{ asset('admin_assets/js/demo/datatables-demo.js') }}"></script>
  
@endsection