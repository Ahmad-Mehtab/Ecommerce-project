@extends('admin.layouts.main')

@section('title', 'Users')

@section('content')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <?php notifications(); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Created At</th>
                            @if (isJuniorAdmin() || isSuperAdmin())                               
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if($users)
                            @foreach ($users as $u)
                                <tr>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->phone}}</td>
                                    <td>{{setUserRole($u->role)}}</td>
                                    <td>{{$u->created_at}}</td>
                                    @if (isJuniorAdmin() || isSuperAdmin())
                                    <td>
                                        <div class="cta-flex">
                                            @if (isSuperAdmin())
                                                <form action="{{route('remove-user')}}" method="POST" >@csrf <input type="hidden" name="userId" value="{{encrypt($u->id)}}"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></form>                                            
                                            @endif
                                            <form action="{{route('edit-user')}}" method="POST" >@csrf <input type="hidden" name="userId" value="{{encrypt($u->id)}}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></form>    
                                        </div>                                              
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection