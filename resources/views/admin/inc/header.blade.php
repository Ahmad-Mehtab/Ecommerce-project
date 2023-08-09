<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link
    rel="icon"
    type="image/x-icon"
    href="{{ asset('site_assets/images/Stardom-Token-DAO-logo-black-color.svg')}}"
  /> --}}

    <title>Dashboard | Stardom</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('uv_assets/images/logo.png')}}" />
    <link rel="icon" type="image/x-icon" href="{{asset('site_assets/images/sc_uk_logo.png')}}">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/styles.css') }}" rel="stylesheet">
  
    <link rel="stylesheet"  href="{{ asset('admin_assets/sweetalert2/package/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('admin_assets/sweetalert2/package/dist/animate.min.css') }}">

    <link href="{{ asset('admin_assets/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/select2/select2-bootstrap4.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/dropzone/min/dropzone.min.css') }}">

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="{{asset('admin_assets/vendor/jquery/jquery.min.js')}}"></script>
    <script>
            function formatTimeSince(date) {
              const seconds = Math.floor((new Date() - date) / 1000);
              let interval = Math.floor(seconds / 31536000);

              if (interval > 1) {
                return interval + " years ago";
              }
              interval = Math.floor(seconds / 2592000);
              if (interval > 1) {
                return interval + " months ago";
              }
              interval = Math.floor(seconds / 86400);
              if (interval > 1) {
                return interval + " days ago";
              }
              interval = Math.floor(seconds / 3600);
              if (interval > 1) {
                return interval + " hours ago";
              }
              interval = Math.floor(seconds / 60);
              if (interval > 1) {
                return interval + " minutes ago";
              }
              return Math.floor(seconds) + " seconds ago";
            }

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('993ec6edc3d261f1f99d', {
              cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
              let noti = parseInt($('.notification_li').attr('id'));
              
              if (noti == data.data.receiver_id) {

                var jsonObject = $.parseJSON(data.data.meta_data);
                var metaMessage = jsonObject.meta_message;
                var Record_id = jsonObject.record_id;

                var data_id = data.data.row_id;
                var record_id = Record_id;

                $.ajax({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type: "POST",
                  url: "{{ url('admin/encrypt') }}",
                  data: {record_id:record_id,data_id:data_id},
                  dataType: "json",
                  success: function (response) {
                    //console.log(response.record_id);

                    const date = new Date();
                    const timeSince = formatTimeSince(date);

                    let pending = parseInt($('#' + data.data.receiver_id).find('.notification_span').html());
                    $('#' + data.data.receiver_id).find('.notification_span').html(pending + 1);

                    var data_r='<div class="dropdown-divider"></div><a  class="dropdown-item frnd_notif" identify-status ="'+data.data.identify_status+'" style="white-space: unset !important; cursor:pointer; color: #2e2f37;text-decoration: none;background-color: #eaecf4;" data-status="0" data-id="'+response.data_id+'" record-id = "'+response.record_id+'" >'+ metaMessage +'<span class="float-right text-primary pl-2 text-sm">'+timeSince+'</span></a> ';    
                    $('#text_body_noti-'+data.data.receiver_id).prepend(data_r);
                    
                  }
                });

              }
              
              

            });

        
            $(document).on('click','.frnd_notif',function(){

              //alert('wow you click');
              var data_status = $(this).attr('data-status');
              var data_id = $(this).attr('data-id');
              var record_id = $(this).attr('record-id');

              var identify_status = $(this).attr('identify-status');

              if (identify_status == 0) {
                var Redirect_url = "<?= url('user/submissions_detail_n').'/'.'"+record_id+"' ?>";
              }else{
                var Redirect_url = "<?= url('admin/user_submissions_n').'/'.'"+record_id+"' ?>";
              }

              
              
              if (data_status == '0') {
               
                $.ajax({

                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type: "POST",
                  url: "{{ url('admin/seen_date_update_notification') }}",
                  data: {id:data_id},
                  dataType: "json",
                  success: function (response) {
                    //console.log(response);
                    if (response.status == true) {
                      window.location.replace(Redirect_url);
                    }else{
                      alert(console.log(response.message));
                    }

                  }
                });
                
              }else{
                //console.log(Redirect_url);
                 window.location.replace(Redirect_url);
              }


            });
            
    </script>


</head>

<body id="page-top">
