@extends('admin.layouts.main')

@section('title', 'Two Factor Enable')
@section('User_details','active')

@section('content')
<div class="card shadow mb-4">
   <div class="card-header bg-gradient-red py-3">
      <h6 class="m-0 font-weight-bold text-white">Two-Factor Authentication</h6>
   </div>
   <div class="card-body">
      <div class="row">
         <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
               <!-- <div class="panel-heading">Two-Factor Authentication</div> -->
               <div class="panel-body">
               <div class="container spark-screen">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">2FA Secret Key</div>

                                <div class="panel-body">
                                    Open up your 2FA mobile app and scan the following QR barcode:
                                    <br />
                                    
                                    <img alt="Image of QR barcode" style='hieght:200px;width:200px' id='base64image'
                                            src='data:image/jpeg;base64, {{ $QR_Image }}' />
                                    <br />
                                    If your 2FA mobile app does not support QR barcodes, 
                                    enter in the following number: <code>{{ $secret }}</code>
                                    <br /><br />
                                    <a href="{{ url('admin/user_profile') }}">Back to profile settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                    
               </div>
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