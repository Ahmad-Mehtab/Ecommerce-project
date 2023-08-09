<div>
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-red py-3">
            <h6 class="m-0 font-weight-bold text-white">Brand List</h6>
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
                @include('livewire.admin.brand.modal')
                <div class="table-responsive">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
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
                    <div class="addBrand d-flex">
                        <button type="button" class="btn btn-primary ml-auto mb-2 mr-2" data-toggle="modal"
                            data-target="#SaveModalRecord">
                            Add Brand
                        </button>
                    </div>
                    <table class="table table-bordered" id="dataTableZ" cellspacing="0" style="color: black">
                        {{-- <table class="table table-bordered" cellspacing="0"> --}}
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->brand}}</td>
                                    <td>{{$brand->slug}}</td>
                                    <td>{{$brand->status}}</td>
                                    <td class="">
                                        <button wire:click="deleteRecord({{$brand->id}})" type="button" class="btn btn-danger delete text-black"
                                            data-toggle="modal" data-target="#DeleteModalRecord">Delete</button>
                                        <a href="#" wire:click="editRecord({{$brand->id}})">
                                            <button type="button" class="btn btn-info edit text-black"
                                                data-toggle="modal" data-target="#EditModalRecord">Edit</button>
                                        </a>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $brands->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#EditModalRecord').modal('hide');
        $('#SaveModalRecord').modal('hide');
    });
</script>
@endpush