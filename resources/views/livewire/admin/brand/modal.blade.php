    {{-- For Brand Edit --}}
    <div wire:ignore.self class="modal fade" id="EditModalRecord" tabindex="-1" role="dialog"
    aria-labelledby="EditModalRecordTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalRecord">Update Brand</h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div wire:loading class="p-3">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>Loading...
                </div>
                <div wire:loading.remove>
                    <form wire:submit.prevent='updateBrand'>
                        <div class="modal-body">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="" for="first_name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="brand"
                                        placeholder="Brand Name" wire:model.defer='brand'>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="" for="first_name">Slug:</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Slug" wire:model.defer='slug'>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="checkbox" wire:model.defer="status" class="form-control" id="status"
                                        name="status">
                                    <label class="" for="exampleCheck1"
                                        >Status</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-nexus bg-gradient-red text-white text-center"
                                type="submit">Update</button>
                            <button type="button" wire:click="closeModal" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{--Edit Modal End --}}

 {{-- For Brand delete --}}
 <div wire:ignore.self class="modal fade" id="DeleteModalRecord" tabindex="-1" role="dialog"
 aria-labelledby="DeleteModalRecordTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="DeleteModalRecord">Delete Brand</h5>
             <button type="button" wire:click="closeModal" class="close" data-dismiss="modal"
                 aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div>
             <div wire:loading class="p-3">
                 <div class="spinner-border text-primary" role="status">
                     <span class="sr-only">Loading...</span>
                 </div>Loading...
             </div>
             <div wire:loading.remove>
                 <form wire:submit.prevent='destroyRecord'>
                     <div class="modal-body">
                         @csrf
                         <div class="form-row">
                           <p>Are you sure want to delete ?</p>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" wire:click="closeModal" class="btn btn-secondary"
                         data-dismiss="modal">Update</button>
                         <button type="submit" class="btn btn-primary"
                             >Yes, Delete</button>
                     </div>
                 </form>
             </div>
         </div> 
     </div>
 </div>
</div>
{{--delete Modal End --}}

<div wire:ignore.self class="modal fade" id="SaveModalRecord" tabindex="-1" role="dialog"
    aria-labelledby="SaveModalRecordTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SaveModalRecord">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='storeBrand'>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="" for="first_name">Name:</label>
                            <input type="text" class="form-control" id="name" name="brand"
                                placeholder="Brand Name" wire:model='brand'>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="" for="first_name">Slug:</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                placeholder="Slug" wire:model='slug'>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="checkbox" class="form-control" id="status" name="status">
                            <label class="" for="exampleCheck1" wire:model="status">Status</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-nexus mx-auto bg-gradient-red text-white text-center"
                    type="submit">Submit</button>
            </div>
            </form>
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