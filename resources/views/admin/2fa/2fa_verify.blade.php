<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TWO-FACTOR | STARBabies Affiliate Platform</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/jpg" href="https://starbabiesnft.com/assets/images/favicon.png"/>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/styles.css') }}" rel="stylesheet">
    

</head>

<body id="page-top bg-dark">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8 ">
                <div class="card mt-5">
                    <div class="card-header bg-gradient-red py-3 ">
                    <h6 class="m-0 font-weight-bold text-white">Two Factor Authentication</h6>    
                    </div>
                   
                    <div class="card-body">
                        <!-- {{session('userObj')}} -->
                        @if(session('error'))
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show text-center">
                            {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        Enter the pin from Google Authenticator app:<br/><br/>
                        <form class="form-horizontal" action="{{ route('2faVerify') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('one_time_password-code') ? ' has-error' : '' }} ">
                                <label for="one_time_password" class="control-label">One Time Password</label>
                                <input id="one_time_password" name="one_time_password" class="form-control col-md-6"  type="text" required/>
                            </div>
                            <button class="btn btn-primary" type="submit">Authenticate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@section('extra_scripts')
      <!-- Page level plugins -->
      <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  
      <!-- Page level custom scripts -->
      <script src="{{ asset('admin_assets/js/demo/datatables-demo.js') }}"></script>
  
@endsection