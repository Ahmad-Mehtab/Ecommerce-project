@extends('admin.layouts.main')

@section('title', 'Category Listing')
@section('configurations','active')

@section('content')
<div class="card shadow mb-4">
        <div class="card-header bg-gradient-red py-3">
            <h6 class="m-0 font-weight-bold text-white">Configure Points Price</h6>
        </div>

        <div class="card-body">
        @if(session('success_settings'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center">
                {{session('success_settings')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-md-12">
        <!-- <h5>Configure Points Price</h5> -->
        <form method="post" action="{{ route('admin.admin_settings_update') }}">
		@csrf
       <div class="form-row align-items-center mt-4">
           <div class="">
               <label for="" class="mb-0">points</label>
            <input type="text" id='points' class="form-control" name="points" value="{{$points}}" disabled required>
           </div>
           <span class="mx-2 font-weight-bold mt-4">=</span>
           <div class="">
               <label for="" class="mb-0">Dollars</label>
           <input type="text" id='dollars' class="form-control" name="dollars" value="{{$dollars}}" disabled required>
           </div>
       </div>

		<input id="setting_btn" type="submit" class="btn btn-dark mt-2 d-none">
        

	</form>
        @if(session()->has('ADMIN_LOGIN') && !session()->has('ADMIN_JUNIOR_LOGIN'))
            <button id="edit_btn" class="btn btn-dark mt-2">Edit</button>
            <button id="back_btn" class="btn btn-dark d-none mt-2">Back</button>
        @endif    
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
      <script type="text/javascript">
$(document).ready(function(){
    // e.preventDefault();

    $("#edit_btn").click(function(e){
            // e.preventDefault();
            $("#setting_btn").removeClass("d-none");
            $("#back_btn").removeClass("d-none");
            $("#edit_btn").addClass("d-none");
            $("#points").removeAttr("disabled");
            $("#dollars").removeAttr("disabled");
            return false;


        });

        $("#back_btn").click(function(e){
            // e.preventDefault();
            $("#setting_btn").addClass("d-none");
            $("#edit_btn").removeClass("d-none");
            $("#back_btn").addClass("d-none");
            $("#points").attr('disabled','disabled');
            $("#dollars").attr('disabled','disabled');
            return false;


        });
});
        </script>
@endsection
