<x-create-modal title='Create Services'>
    <div class="col-md-6 mb-0">
        <label for="emailBasic" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Counter Name"
            wire:model='name' />
            @include('admin.errors',['property'=>'name'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Icon</label>
        <input type="text" class="form-control"
        placeholder="icon" wire:model='icon' />
        @include('admin.errors',['property'=>'icon'])
    </div>
    <div class="col-md-12 mb-0 mt-2">
        <label class="form-label">Description</label>
        <textarea type="text" class="form-control"
            placeholder="Description" wire:model='description' ></textarea>
            @include('admin.errors',['property'=>'description'])
    </div>
</x-create-modal>
