<x-update-modal title='Update Services'>
    <div class="col mb-0">
        <label for="emailBasic" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Counter Name"
            wire:model='name' />
            @include('admin.errors',['property'=>'name'])
    </div>
    <div class="col mb-0">
        <label class="form-label">Discription</label>
        <input type="text" class="form-control"
            placeholder="Discription" wire:model='description' />
            @include('admin.errors',['property'=>'description'])
    </div>
    <div class="col mb-0">
        <label class="form-label">Icon</label>
        <input type="text" class="form-control"
            placeholder="icon" wire:model='icon' />
            @include('admin.errors',['property'=>'icon'])
    </div>
</x-update-modal>
