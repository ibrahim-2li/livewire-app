<x-update-modal title='Update Categories'>
    <div class="col mb-0">
        <label for="emailBasic" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Categories Name"
            wire:model='name' />
            @include('admin.errors',['property'=>'name'])
    </div>
</x-update-modal>
