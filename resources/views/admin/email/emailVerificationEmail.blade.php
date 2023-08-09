<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
</head>
<body>
	<div style="margin:auto;border-width:8px 1px 1px;border-style:solid;border-radius:20px;text-align:center;font-size:18px;font-family:sans-serif;max-width:750px">
        <div style="padding-top: 11px;">
            <img src="https://i.ibb.co/M2wW944/Updated-logo-back-office-Stardom-UK-bk.png" alt="Updated-logo-back-office-Stardom-UK-bk" border="0" width="300">
        </div>
        <div style="padding:0% 8%">
            <p style="text-align:left"><strong>Dear Member,<span style="text-align:center"></span></strong></p>
            <p style="text-align:left"><strong>{{ $fullName }}!</strong></p>
            <p style="text-align:left">Thank you for registering for the Stardom Membership!</p>


            <p style="text-align:left">
            	Your verification code: <span style="color:blue;"> {{ $code }} </span> <br>
            </p>
            <p style="text-align:left">Please Visit this Link and verify email:</p>
            <p style="text-align:left"><a target='_blank' class='blue' href='{{ $link }}'>VERIFY LINK IS HERE</a> </p>

        </div>
    </div>
</body>
</html>
<style>
    .blue{
        color: blue;
    }
</style>
{{--
Hello <b>{{ $fullName }}</b> Thank you for registering for the Stardom Membership Packages and Affiliate opportunity!
<br><br>
This is your back office where you can log in and see all the details of your Affiliate account.
<a target='_blank' href='{{ $base_url }}/admin/login'>Click to login</a>

<p>Here are your login credentials:</p>
Email: {{ $email }} <br>
Password: {{ $password }}
<br>
<p>Here is your own Affiliate link for sharing this opportunity:</p>
<a target='_blank' href='{{ $refferal_url }}/?referral={{$user_name}}'>{{ $refferal_url }}/?referral={{$user_name}}</a>
<br>

<p>We are excited you have joined us on this incredible journey!</p> --}}


        {{-- <h1>Email Verification Mail STARDOM UK</h1>

        Please verify your email with link:
        <a target='_blank' href='{{ route('user.verify', $token) }}'>Verify Email</a>
        <br><br>

        To log-in to your <b> STARDOM AFFILIATE </b> Back Office, please use this <a href="{{ url('admin/login') }}">Link</a> with credientials provided to you in separeate email from Rhonda (info@affiliate.blockchainalliance.global)
        <br>
        <br>
        <p>Please join our Discord to enjoy the community and keep up with important updates on the NFT launch.
        <br>
        <a target='_blank' href='https://discord.com/invite/VAJThGuZ8R'>Join Discord</a>
        <br>

        See you on the Red Carpet!</p>

        <p>Thank you</p>

        <p>The STARDOM Family</p> --}}


