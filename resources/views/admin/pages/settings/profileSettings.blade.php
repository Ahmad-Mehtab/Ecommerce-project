@extends('admin.layouts.main')

@section('title', 'Profile settings')


@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Profile Settings</h1>
    </div>

    {{notifications()}}

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Profile settings</div>
                <div class="card-body">
                    
                    <form method="post" action="{{route("update-profile")}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="profile_img_wrapper">
                                    <img width="100" height="100" src="" alt="">
                                    <label class="profile_img--overlay" for="pf_img">
                                        <i class="fas fa-upload"></i>
                                        <label>Upload</label>
                                    </label>
                                    <input class="d-none" type="file" name="user_image" value="" id="pf_img" />
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputname">Name</label>
                                <input class="form-control @error('name') border border-danger @enderror" name="name" id="inputname" type="text" required  value="{{old('name', $user->name)}}">
                                @error('name')
                                <span class="text-danger small">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputphone">Phone</label>
                                <input class="form-control @error('phone') border border-danger @enderror" name="phone" id="inputphone" type="text" value="{{old('phone',$user->phone)}}">
                                @error('phone')
                                <span class="text-danger small">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputemail">Email</label>
                                <input class="form-control @error('email') border border-danger @enderror" name="email" id="inputemail" type="email" value="{{old('email',$user->email)}}">
                                @error('email')
                                <span class="text-danger small">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputoccupation">Occupation</label>
                                <input class="form-control" name="occupation" id="inputoccupation" type="text" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputwallet_address">Wallet Address</label>
                                <input class="form-control" name="wallet_address" id="inputwallet_address" type="text" value="">
                            </div>
                        </div> --}}
                        <!-- Save changes button-->
                        <button class="btn btn-primary" name="update_profile" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputcurrent_pass">Current Password</label>
                                <input class="form-control" name="current_pass" id="inputcurrent_pass" type="password" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputnew_pass">New Password</label>
                                <input class="form-control" name="new_pass" id="inputnew_pass" type="password" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputconfirm_pass">Confirm Password</label>
                                <input class="form-control" name="confirm_pass" id="inputconfirm_pass" type="password" required>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" name="change_pass" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection