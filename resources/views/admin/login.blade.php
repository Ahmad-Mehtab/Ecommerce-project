<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>LOGIN | STARDOM UK</title>
    <link
    rel="icon"
    type="image/x-icon"
    href="{{ asset('site_assets/images/Stardom-Token-DAO-logo-black-color.svg')}}"
  />
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') ?? '' }}"></script>

</head>

<body class="admin-bg" style="background: #ad1020;" onload="disabled()" >

    <div class="container py-5">

        <!-- Outer Row -->
        <div class="d-flex align-items-center justify-content-start flex-column flex-md-row flex-lg-row">
            <img src="{{asset('/site_assets/images/sc_uk_logo.png')}}" alt="" style="height: 100px">
        </div>
        <div class="d-flex align-items-center justify-content-center flex-column flex-md-row flex-lg-row">
            <h2 class="text-white text-center mb-3 font-weight-bold text-uppercase ml-1">Stardom UK</h2>
        </div>
        <div class="row justify-content-center">

            <div class="col-xl-4 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 bg-gradient-dark shadow-lg-dark text-white my-1">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                            <!-- <button class="btn btn-samll bg-dark text-white ">Back to home</button> -->

                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-white mb-4">Welcome Back!</h1>
                                    </div>

                                    @if (Session::has('successSignup'))
                                    <div class="alert alert-success" role="alert">
                                       {{ Session::get('successSignup') }}
                                    </div>
                                    @endif

                                    @if (Session::has('u_id'))
                                    <div class="col-md-12 alert alert-warning" role="alert">
                                        <form action="{{route('user.resendEmail')}}" class="user" method="post" id="resend_form">
                                            @csrf
                                            <input type="hidden" name="u_id" id="u_id" value="{{ Session::get('u_id') }}">
                                            <p>If you dont recieved your verification email,Click on Resend email</p>
                                            <div class="row">
                                                <button class="btn btn-primary text-white btn-user btn-block col-md-8 resend_btn" type="submit">Resend email</button>
                                                <span><img src="{{ asset('user_assets/images/spinner2.gif') }}" alt="spinner" id="spinner2"  class="d-none" style="height: 40px;"></span>
                                            </div>

                                        </form>

                                    </div>
                                    @endif
                                    <form action="{{route('admin.auth')}}" class="user login_form" method="post">
                                    @error('throttle')
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show text-center">
                                                {{$message}}
                                                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button> -->
                                            </div>
                                    @enderror
                                    @if(session('error'))
                                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show text-center">
                                                {{session('error')}}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                    @endif
                                    @if(session('info'))
                                    <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show text-center">
                                        {{session('info')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                        @if(session('success'))
                                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center">
                                                {{session('success')}}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                          @if(session('successMobileMsg'))
                                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center">
                                                {{session('successMobileMsg')}}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                name="email" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password" required>

                                            <input type="hidden" name="g-recaptcha-response" id="response" >
                                        </div>

                                        <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->

                                            {{-- <div class="row mb-2">
                                              <div class="col-12 d-flex justify-content-between small">
                                                <div class="custom-control custom-radio">
                                                  <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                                  <label class="custom-control-label" for="customRadioInline1">STARBabies User</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                  <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                  <label class="custom-control-label" for="customRadioInline2">Contest User</label>
                                                </div>
                                              </div>
                                            </div> --}}

                                        @if ($errors->has('throttle'))

                                        <button class="btn btn-basic bg-gradient-red text-white btn-user btn-block" type="submit" disabled>Login</button>
                                        @else
                                        <button class="btn btn-basic bg-gradient-red btn-user btn-block" type="submit">Login</button>
                                        @endif

                                        <div class="form-group row">
                                        <div class="col-md-12 text-center">
                                            <div class="col-md-12 mt-2">
                                                <label>
                                                    <a href="{{ route('forget.password.get') }}"><u>Reset Password</u></a>
                                                </label>
                                            </div>
                                            {{-- <p class="text-center text-white mt-1 small"><em class="text-muted">Don`t have an account? </em><a href="{{url('/')}}/#affiliate-section" class="fw-bold text-white"><u>Click here</u></a></p> --}}
                                        </div>
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

 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        // yasen
        setTimeout(function() {
            $(".alert-success").alert('close');
            $(".alert-warning").alert('close');
            $(".alert-danger").alert('close');
            $('#email').val('');
            $('#password').val('');
        }, 2500);

        init();

    $('body').on('click','#resend_form', function(){
            $('#spinner2').removeClass('d-none');
        });

});

function init(){

    grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.site_key') ?? '' }}', {action: 'admin/auth'}).then(function(token) {
            // Add your logic to submit to your backend server here.
            if (token) {
                $('#response').val(token);
            }

        });
    });

}


    </script>
    @yield('extra_scripts')

</body>

</html>
