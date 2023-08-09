@extends('admin.layouts.main')

@section('title', 'Users')
@section('Users_list', 'active')

@section('content')
    <!-- DataTales Example -->
   
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-red py-3">
            <h6 class="m-0 font-weight-bold text-white">Doctor List</h6>
        </div>
        @if (session()->has('message'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">
            @if (session('success'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show text-center">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
           
            <div class="col-md-12 row">
                <div class="card my-3 shadow col-md-12">
                    <div class="card-body">
                        <h2 class="text-info">Search by:</h2>
                        <div class="col-md-12">
                            <form action="{{ url('admin/category-update/'. $cate->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="" for="first_name" >Name:</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Category Name" value="{{$cate->name}}">
                                        {{-- <input type="hidden" class="form-control" id="name" name="id"
                                            placeholder="Category Name" value="{{$cate->id}}"> --}}
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="" for="phone">slug:</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Slug" value="{{$cate->slug}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="" for="image">Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                        <img style="width: 80px; margin-top: 10px;" src="{{asset('user_assets/img/'. $cate->image)}}" alt="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label style="">Description</label>
                                        <textarea class="form-control" id="desc" name="description" rows="3" value="{{$cate->description}}">{{$cate->description}}</textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="checkbox" class="form-control" id="status" name="status" {{$cate->status == '1' ? 'checked': '' }}>
                                        <label class="" for="exampleCheck1">Status</label>
                                    </div>
                                </div>
                                <h2>SEO Tag</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                       <label class="" for="phone">Meta Title:</label>
                                       <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            placeholder="Meta Title" value="{{$cate->meta_title}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="" for="phone">Meta Desc:</label>
                                        <input type="text" class="form-control" id="Meta_desc" name="Meta_desc"
                                            placeholder="Meta Desc" value="{{$cate->meta_desc}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="" for="phone">Meta Keyword:</label>
                                        <input type="text" class="form-control" id="Meta_keyword" name="meta_keyword"
                                            placeholder="Meta Keyword" value="{{$cate->meta_keyword}}">
                                    </div>
                                    <button class="btn btn-nexus mx-auto bg-gradient-red text-white text-center"
                                        type="submit">Submit</button>
    
                                </div>
    
                            </form>
                        </div>
                    </div>
                </div>
    
    
                <div class="table-responsive">
    
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="card shadow mb-4">
                                <div class="card-header bg-gradient-red">
                                    <h6 class="font-weight-bold text-white text-center">Action Info</h6>
                                </div>
                                <div class="card-body text-center">
                                    @if (!session()->has('ADMIN_JUNIOR_LOGIN'))
                                        <i class="fa fa-user text-dark  fa-2x" aria-hidden="true"></i><span
                                            class="ml-2">Affiliate</span>
                                        <i class="fas fa-user-tie text-success ml-3 fa-2x" aria-hidden="true"></i><span
                                            class="ml-2">Pro Affiliate</span>
                                        <i class="far fa-edit text-info ml-3 fa-2x"></i><span class="ml-2">Edit</span>
                                        <i class="fa fa-trash text-danger ml-2 fa-2x" aria-hidden="true"></i><span
                                            class="ml-2">Delete</span>
                                    @endif
                                    <i class="fa fa-info-circle text-info ml-3 fa-2x" aria-hidden="true"></i><span
                                        class="ml-2">Details</span>
    
    
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- {{ $data->links('pagination::bootstrap-4') }} --}}
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('extra_scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('admin_assets/js/demo/datatables-demo.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

        <script type="text/javascript">
            function radioBtnClick(event) {

                alert('value: ' + $(this).val());

            }

            $(document).ready(function() {

                $('.dataTables_filter').css({
                    'float': 'right'
                });

                $("body").on("click", ".copy-text", function() {
                    let txt = $(this).siblings(".address").text();
                    txt = txt.replace(/\s/g, '');
                    navigator.clipboard.writeText(txt);
                    let i = $(this).find("i");
                    i.addClass("fa-check").removeClass("fa-copy");
                    i.css("color", "#ff6023");
                    setTimeout(function() {
                        i.addClass("fa-copy").removeClass("fa-check");
                        // i.removeAttr("style");
                    }, 1000);
                });

                $("body").on("click", ".copy-text-code", function() {
                    let txt = $(this).siblings(".code_value").text();
                    txt = txt.replace(/\s/g, '');
                    navigator.clipboard.writeText(txt);
                    let i = $(this).find("i");
                    i.addClass("fa-check").removeClass("fa-copy");
                    i.css("color", "#ff6023");
                    setTimeout(function() {
                        i.addClass("fa-copy").removeClass("fa-check");
                        // i.removeAttr("style");
                    }, 1000);
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                // AFFILIATE AND PRO AFFILIATE FILTER


            });
        </script>
    @endsection
