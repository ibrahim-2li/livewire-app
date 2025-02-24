<div>
    <div class="mt-1 d-flex justify-content-end diaplay-inline">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Create
        </button>

        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg" role="document">
               <form wire:submit.prevent='submit'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col mb-0">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <label for="emailBasic" class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Skills Name" wire:model='name' />
                            </div>
                            <div class="col mb-0">
                                @error('progress')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                                <label  class="form-label">Progress</label>
                                <input type="number" min="1" max="100" class="form-control" placeholder="10" wire:model='progress' />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>
