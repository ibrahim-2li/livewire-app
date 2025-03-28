<x-create-modal title='Create Counter'>
    <div class="col mb-0">
        <label for="emailBasic" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Counter Name"
            wire:model='name' />
            @include('admin.errors',['property'=>'name'])
    </div>
    <div class="col mb-0">
        <label class="form-label">Count</label>
        <input type="number" min="1" max="1000000" class="form-control"
            placeholder="10" wire:model='count' />
            @include('admin.errors',['property'=>'count'])
    </div>
    <div class="col mb-0">
        <label class="form-label">Icon</label>
        <input type="text" class="form-control"
            placeholder="icon" wire:model='icon' />
            @include('admin.errors',['property'=>'icon'])
    </div>
</x-create-modal>
