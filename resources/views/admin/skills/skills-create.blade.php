<x-create-modal title='Create Skill'>
    <div class="col mb-0">
        <label for="emailBasic" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Skills Name"
            wire:model='name' />
            @include('admin.errors',['property'=>'name'])
    </div>
    <div class="col mb-0">
        <label class="form-label">Progress</label>
        <input type="number" min="1" max="100" class="form-control"
            placeholder="10" wire:model='progress' />
            @include('admin.errors',['property'=>'progress'])
    </div>
</x-create-modal>
