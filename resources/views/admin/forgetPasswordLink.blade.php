<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>@yield('title')SET NEW PASSWORD | STARDOM UK</title>
      <link
    rel="icon"
    type="image/x-icon"
    href="{{ asset('site_assets/images/Stardom-Token-DAO-logo-black-color.svg')}}"
  />
      <!-- Custom fonts for this template-->
      <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="{{ asset('admin_assets/css/sb-admin-2.css') }}" rel="stylesheet">
      <link href="{{ asset('admin_assets/css/styles.css') }}" rel="stylesheet">

       <style>
            body{
                background: #ad1020;
            }

       </style>

   </head>
   <body class="bg-deep-dark">
      <div class="container py-5">
         <!-- Outer Row -->
         <div class="d-flex align-items-center justify-content-start flex-column flex-md-row flex-lg-row">
            <img src="{{asset('/site_assets/images/sc_uk_logo.png')}}" alt="" style="height: 100px">
        </div>
        <div class="d-flex align-items-center justify-content-center flex-column flex-md-row flex-lg-row">
            <h2 class="text-white text-center mb-3 font-weight-bold text-uppercase ml-1">Stardom UK</h2>
        </div>
         <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-12 col-md-9">
               <div class="card o-hidden border-0 shadow-lg-dark my-5">
                  <main class="login-form">
                     <div class="cotainer">

                        <div class="row justify-content-center">
                           <div class="col-md-12">
                              <div class="card border-0">
                                 <div class="card-header bg-gradient-red text-white text-center">Set New Password</div>
                                 <div class="card-body">
                                    <form action="{{ route('reset.password.post') }}" method="POST" autocomplete="off" style="color:black" >
                                       @csrf
                                       <input type="hidden" name="token" value="{{ $token }}">
                                       <div class="form-group row">
                                          <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                          <div class="col-md-6">
                                             <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                             @if ($errors->has('email'))
                                             <span class="text-danger">{{ $errors->first('email') }}</span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                          <div class="col-md-6">
                                             <input type="password" id="password" class="form-control" name="password" required autofocus>
                                             @if ($errors->has('password'))
                                             <span class="text-danger">{{ $errors->first('password') }}</span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                          <div class="col-md-6">
                                             <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                             @if ($errors->has('password_confirmation'))
                                             <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-md-6 offset-md-4">
                                          <button type="submit" class="btn bg-gradient-red text-white mb-1">
                                          Reset Password
                                          </button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </main>
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
      @yield('extra_scripts')
   </body>
</html>
