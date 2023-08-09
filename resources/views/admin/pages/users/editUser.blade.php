@extends('admin.layouts.main')

@section('title', 'Users')

@section('content')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
    </div>

   <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 border-0 shadow">
                <div class="card-header border-0 bg-gradient-primary text-white">Edit user</div>
                <div class="card-body">
                    <?php notifications() ?>
                    <form method="post" class="za-add-user" action="{{route('update-user')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="small mb-1" for="inputname">Full name</label>
                                <input class="form-control @error('email') border border-danger @enderror" id="inputname" type="text" value="{{ old('name', $user->name) }}" placeholder="Enter full name" name="name">
                                @error('name')
                                <span class="text-danger small">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="small mb-1" for="inputemail">Email address</label>
                                <input class="form-control @error('email') border border-danger @enderror" id="inputemail" type="email" value="{{ old('email', $user->email) }}" placeholder="Enter email address" name="email">
                                @error('email')
                                <span class="text-danger small">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Group (email address)-->
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label class="small mb-1" for="user-role">User role </label>
                                <select class="form-control" name="role" id="user-role">
                                    <option value="">-- Select user role --</option>
                                    <option value="<?= JUNIOR_ADMIN ?>" {{ old('role', $user->role) == JUNIOR_ADMIN ? 'selected' :'' }}>Junior Admin</option>
                                    <option value="<?= PROJECT_OWNER ?>" {{ old('role', $user->role) == PROJECT_OWNER ? 'selected' :'' }}>Project Owner</option>
                                    <option value="<?= USER ?>" {{ old('role', $user->role) == USER ? 'selected' :'' }}>User</option>
                                </select>
                            </div>
                        </div>


                        <!-- Form Group (email address)-->
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control @error('email') border border-danger @enderror" id="inputPhone" name="phone" value="{{ old('phone', $user->phone) }}" type="tel" placeholder="Enter your phone number" data-inputmask="'mask': '9999 9999 9999 9999'" >
                                @error('phone')
                                <span class="text-danger small">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- <!-- Form Row-->
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                <input class="form-control @error('email') border border-danger @enderror" id="inputPassword" type="password" placeholder="Enter password" name="password">
                                @error('password')
                                <span class="text-danger small">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <!-- Form Row-->
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="small mb-1" for="inputConfirmpass">Confirm Password</label>
                                <input class="form-control @error('email') border border-danger @enderror" id="inputConfirmpass" type="password" name="confirm_password" placeholder="Confirm password">
                                @error('confirm_password')
                                <span class="text-danger small">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        <input type="hidden" name="userId" value="{{encrypt($user->id)}}">
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


