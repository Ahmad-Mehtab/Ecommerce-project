@extends('admin.layouts.main')

@section('title', 'Two Factor Enable')
@section('User_details','active')

@section('content')
<!-- google2fa -->
@if(!count($data['user']->PasswordSecurity))

<p>Enable 2FA on your account.</p>
<p>Click the generate secret button to generate your code</p>
<p>Enter this into Googel Authenticator App</p>

<form method="POST" action="{{ route('generate2faSecretCode') }}">
  @csrf
  <div class="form-group">
    <button type="submit" class="btn btn-info" name="button">Generate Secret Key</button>
  </div>
</form>

@elseif(!$data['user']->PasswordSecurity->google2fa_enable)

<p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors)
  to verify your identity.</p>

  <p>To Enable Two Factor Authentication on your Account, you need to do the following steps:</p>

  <p><b>1. Scan this barcode with your Google Authenticator App:</b></p>
  <img src="{{ $data['google2FaUrl'] }}">
  <p><b>2. Enter the pin to Enable 2FA:</b></p>

  <form method="POST" action="{{ route('enable2fa') }}">
    @csrf

    <div class="form-row">
      <div class="form-group col-sm-4">
        <p><b>Authenticator Code:</b></p>
      </div>
      <div class="form-group col-sm-8">
        <input type="password" class="form-control" name="verifyCode" id="verifyCode" required>
      </div>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success" name="button">Enable 2FA</button>
    </div>
  </form>

  @elseif($data['user']->PasswordSecurity->google2fa_enable)

  <p><b>2FA is enabled.</b></p>
  <p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA below.</p>

  <form method="POST" action="{{ route('disable2fa') }}">
    @csrf
    <div class="form-group">
      <input type="password" class="form-control" name="currentPassword" id="currentPassword" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" name="button">Disable 2FA</button>
    </div>
  </form>

  @endif

  @endsection


@section('extra_scripts')
      <!-- Page level plugins -->
      <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  
      <!-- Page level custom scripts -->
      <script src="{{ asset('admin_assets/js/demo/datatables-demo.js') }}"></script>
  
@endsection