<x-create-modal title='Create Project'>
    <div class="col-md-6 mb-0">
        <label for="emailBasic" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Counter Name"
            wire:model='name' />
            @include('admin.errors',['property'=>'name'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Link</label>
        <input type="text" class="form-control"
        placeholder="Link" wire:model='link' />
        @include('admin.errors',['property'=>'link'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Image</label>
        <input type="file" class="form-control"
        wire:model='image' />
        @include('admin.errors',['property'=>'image'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">Category</label>
        <select type="text" class="form-control"
        wire:model='category_id'>
        <option value=""> Select Category</option>
        @if (count($categories) > 0)
            @foreach ($categories as $category )
            <option value="{{ $category->id }}" wire:key="category-{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        @endif
        </select>
        @include('admin.errors',['property'=>'category_id'])
    </div>

    <div class="d-flex justify-content-center align-items-center">
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" width="auto" height="150px">
        @endif
    </div>

    <div class="col-md-12 mb-0 mt-2">
        <label class="form-label">Description</label>
        <textarea type="text" class="form-control"
            placeholder="Description" wire:model='description' ></textarea>
            @include('admin.errors',['property'=>'description'])
    </div>
</x-create-modal>
