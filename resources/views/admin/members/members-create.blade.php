<x-create-modal title='Create Member'>
    <div class="col-md-6 mb-0">
        <label for="emailBasic" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Counter Name"
            wire:model='name' />
            @include('admin.errors',['property'=>'name'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Position</label>
        <input type="text" class="form-control"
        placeholder="Position" wire:model='position' />
        @include('admin.errors',['property'=>'position'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Image</label>
        <input type="file" class="form-control"
        wire:model='image' />
        @include('admin.errors',['property'=>'image'])
    </div>

    <div class="d-flex justify-content-center align-items-center">
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" width="auto" height="150px">
        @endif
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Facebook</label>
        <input type="text" class="form-control"
        placeholder="Facebook" wire:model='facebook' />
        @include('admin.errors',['property'=>'facebook'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Twitter</label>
        <input type="text" class="form-control"
        placeholder="Twitter" wire:model='twitter' />
        @include('admin.errors',['property'=>'twitter'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Linkedin</label>
        <input type="text" class="form-control"
        placeholder="Linkedin" wire:model='linkedin' />
        @include('admin.errors',['property'=>'linkedin'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Instagram</label>
        <input type="text" class="form-control"
        placeholder="Instagram" wire:model='instagram' />
        @include('admin.errors',['property'=>'instagram'])
    </div>


</x-create-modal>
