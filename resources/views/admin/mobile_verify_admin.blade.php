@extends('admin.layouts.main')

@section('title', 'Dashboard')
@section('Users_list','active')

@section('content')

<div class="cotainer">
                     <div class="row justify-content-center">
                        <div class="col-md-8">
                           <div class="card border-0">
                              <div class="card-header bg-gradient-dark text-white text-center">Verify Mobile Number</div>
                              <div class="card-body">
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
                                 @if (Session::has('info_msg'))
                                 <div class="alert alert-info" role="alert">
                                    {{ Session::get('info_msg') }}
                                 </div>
                                 @endif                                                    
                                 <form action="{{ route('admin.mobileVerifyAdmin') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                       <label for="email_address" class="col-md-4 col-form-label text-md-right">Code</label>
                                       <div class="col-md-6">
                                          <input type="number" id="code" class="form-control" name="code" required autofocus>
                                          @if ($errors->has('code'))
                                          <span class="text-danger">{{ $errors->first('code') }}</span>
                                          @endif
                                       </div>
                                    </div>
                                    <input type="hidden" id="phone" class="form-control" name="phone" value="{{session()->get('admin_number')}}">
                                    <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn bg-gradient-red text-white mb-1">
                                       Submit
                                       </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

@endsection