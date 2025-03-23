<x-create-modal title='Create Ctegories'>
    <div class="col-md-6 mb-0">
        <label for="emailBasic" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Counter Name"
            wire:model='name' />
            @include('admin.errors',['property'=>'name'])
    </div>
</x-create-modal>
