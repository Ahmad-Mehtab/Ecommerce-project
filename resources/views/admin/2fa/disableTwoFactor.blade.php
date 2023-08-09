@extends('admin.layouts.main')

@section('title', 'Two Factor Enable')
@section('User_details','active')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">2FA Secret Key</div>

                <div class="panel-body">
                    2FA has been removed
                    <br /><br />
                    <a href="{{ url('admin/dashboard') }}">Go Home</a>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection


@section('extra_scripts')
      <!-- Page level plugins -->
      <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  
      <!-- Page level custom scripts -->
      <script src="{{ asset('admin_assets/js/demo/datatables-demo.js') }}"></script>
  
@endsection