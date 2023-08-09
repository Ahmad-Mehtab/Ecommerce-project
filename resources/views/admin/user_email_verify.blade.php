<?php

if (Session::has('info')) {
    $count_css = 'd-none';
    $resend_css = '';
} else {
    $count_css = '';
    $resend_css = 'd-none';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('admin_assets/sweetalert2/package/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/sweetalert2/package/dist/animate.min.css') }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') VERIFY EMAIL | STARDOM UK</title>
    <link rel="icon" type="image/x-icon"
        href="{{ asset('site_assets/images/Stardom-Token-DAO-logo-black-color.svg') }}" />
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/styles.css') }}" rel="stylesheet">
    <style>
        body {

            background: #ad1020;

        }

        span#countdown {
            /* text-align: center; */
            display: flex;
            padding: 10px
        }

        @media (max-width: 576px) {
            .varify_count {
                display: inline !important;
            }
        }
    </style>
</head>

<body class="bg-deep-dark">
    <div class="container py-5">
        <!-- Outer Row -->
        <div class="d-flex align-items-center justify-content-start flex-column flex-md-row flex-lg-row">
            <img src="{{ asset('/site_assets/images/sc_uk_logo.png') }}" alt="" style="height: 100px">
        </div>
        <div class="d-flex align-items-center justify-content-center flex-column flex-md-row flex-lg-row">
            <h2 class="text-white text-center mb-3 font-weight-bold text-uppercase ml-1">Stardom UK</h2>
        </div>
        <div class="row justify-content-center ">
            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg-dark my-5">
                    <main class="login-form">
                        <div class="cotainer">
                            <div class="row justify-content-center">

                                <div class="col-md-12">
                                    <div class="card border-0">
                                        <div class="card-header bg-gradient-red text-white text-center">Verify Email
                                        </div>
                                        <div class="card-body" style="color:black">


                                            @if (Session::has('message'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ Session::get('message') }}
                                                </div>
                                            @endif
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ Session::get('error') }}
                                                </div>
                                            @endif

                                            @if (Session::has('successSignup'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ Session::get('successSignup') }}
                                                </div>
                                            @endif
                                            <div class="">
                                                <h5><i class="fa fa-info-circle" aria-hidden="true"></i> If you do not
                                                    receive the email within 10 mins, please send an email to <br> <span
                                                        style="padding-left: 23px;"
                                                        class="text-primary font-weight-bold">support@stardom-uk.com</span>
                                                </h5>
                                            </div>
                                            <form action="" id="email_verify_code" autocomplete="off">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email_address">Code:</label>
                                                            <input type="number" id="code" class="form-control"
                                                                name="code" required autofocus>
                                                            @if ($errors->has('code'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('code') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <input type="hidden" id="user_id" class="form-control"
                                                        name="user_id" value="{{ $user_id }}">
                                                    <div class="col-md-7 col-sm-7 d-block mx-auto">
                                                        <div class="varify_count" style="display: -webkit-box;">
                                                            <button
                                                                class="btn btn-block verify_code bg-gradient-red text-white"
                                                                type="button">
                                                                <span class="spinner-grow spinner-grow-sm d-none"
                                                                    role="status" aria-hidden="true"></span>
                                                                <span class="btn_txt">Verify</span>
                                                            </button>
                                                            <span id="countdown" class="ms-4 {{ $count_css }}"></span> <br>
                                                        </div>



                                                        <div class="resend_code mb-1 {{ $resend_css }}">
                                                            <br>
                                                            <span class="text-primary font-weight-bold">Didn't get the
                                                                code?</span>
                                                            <button
                                                                class="btn btn-block resend_code_btn  bg-gradient-red text-white "
                                                                type="button" data-id="{{ $user_id }}">
                                                                <span class="spinner-border d-none spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                                <span class="btn_txt_2">Resend Code</span>
                                                            </button>
                                                        </div>
                                                        <div class="alert success_alert alert-success d-none"
                                                            role="alert"></div>
                                                    </div>
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
    <script src="{{ asset('admin_assets/sweetalert2/package/dist/sweetalert2.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script>
        $(document).ready(function() {





            var submit_success_route = "<?= url('admin/login') ?>";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.verify_code', function(e) {

                e.preventDefault();

                var code = $('#code').val();
                var user_id = $('#user_id').val();

                if (code == "") {
                    //alert('Please enter Code');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter Code!',
                    });
                } else {

                    $('.spinner-grow').removeClass('d-none');
                    $('.btn_txt').text('Verifying..');
                    $('.verify_code').attr('disabled', true);

                    $.ajax({
                        type: "POST",
                        url: "{{ url('user/verify_code_email_bkoffice') }}",
                        data: {
                            code: code,
                            user_id: user_id
                        },
                        dataType: "json",
                        success: function(response) {
                            //console.log(response);
                            if (response.status == true) {
                                $('.verify_code').attr('disabled', false);
                                $('.spinner-grow').addClass('d-none');
                                $('.btn_txt').text('Verify');

                                Swal.fire({
                                    title: response.message,
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    }
                                }).then((result) => {
                                    /* Read more about handling dismissals below */

                                    location.replace(submit_success_route);

                                });


                            } else {
                                $('.verify_code').attr('disabled', false);
                                $('.spinner-grow').addClass('d-none');
                                $('.btn_txt').text('Verify');
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                });
                            }

                        }
                    });
                }





            });

            ///////////////////////////////////////////////////////////////
            // Set the initial date and time
            var countdownDate = new Date();
            countdownDate.setMinutes(countdownDate.getMinutes() + 2);

            // Update the countdown every second
            var countdown = setInterval(function() {
                // Get the current date and time
                var now = new Date().getTime();

                // Calculate the time remaining
                var distance = countdownDate - now;

                // Calculate the minutes and seconds remaining
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the countdown in the element with id="countdown"
                $("#countdown").text(minutes + "m " + seconds + "s ");

                // If the countdown is finished, display a message
                if (distance < 0) {
                    clearInterval(countdown);
                    $("#countdown").text("");
                    $('.resend_code').removeClass('d-none');

                }
            }, 1000); // Update every second (1000 milliseconds)


            ////////////////////////////////////////////////////////////////////////////////////////
            $(document).on('click', '.resend_code_btn', function() {
                var user_id = $(this).attr('data-id');
                $('.spinner-border').removeClass('d-none');
                $(this).attr('disabled', true);
                $.ajax({
                    type: "POST",
                    url: "{{ url('user/resend_email_code') }}",
                    data: {
                        user_id: user_id
                    },
                    dataType: "json",
                    success: function(response) {
                        //console.log(response);
                        $('.resend_code_btn').removeAttr("disabled");
                        $('.spinner-border').addClass('d-none');
                        if (response.status == true) {
                            $('.success_alert').removeClass('d-none').html(response.message);
                            setTimeout(() => {
                                $('.success_alert').html('').addClass('d-none');
                            }, 5000);
                        }

                    }
                });
                //alert(user_id);


            });

        });
    </script>
    <!-- @yield('extra_scripts') -->
</body>

</html>
<style>
    .swal2-popup {

        display: none;
        position: relative;
        box-sizing: border-box;
        grid-template-columns: minmax(0, 100%);
        width: 21em;
        max-width: 100%;
        padding: 0 0 1.25em;
        border: none;
        border-radius: 5px;
        background: #fff;
        color: #933838;
        font-family: inherit;
        font-size: 1rem;
    }

    .swal2-confirm {
        background: linear-gradient(169deg, #cc1426, #5c060f) !important;
    }
</style>
