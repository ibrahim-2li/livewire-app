<x-update-modal title='Update Project'>
    <div class="col-md-6 mb-0">
        <label for="emailBasic" class="form-label">@lang('Title')</label>
        <input type="text" class="form-control" placeholder="@lang('ُEvent Title')" wire:model='title' />
        @include('admin.errors', ['property' => 'title'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Location')</label>
        <input type="text" class="form-control" placeholder="@lang('Event Location')" wire:model='location' />
        @include('admin.errors', ['property' => 'location'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Map')</label>
        <input type="text" class="form-control" placeholder="@lang('Event Direction')" wire:model='map' />
        @include('admin.errors', ['property' => 'map'])
    </div>
    {{-- <div class="col-md-6 mb-0">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" wire:model='image' />
        @include('admin.errors', ['property' => 'image'])
    </div>

    <div class="d-flex justify-content-center align-items-center">
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" width="auto" height="150px">
        @endif
    </div> --}}
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Start Date')</label>
        <input type="date" class="form-control" wire:model='start_date' />
        @include('admin.errors', ['property' => 'start_date'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('End Date')</label>
        <input type="date" class="form-control" wire:model='end_date' />
        @include('admin.errors', ['property' => 'end_date'])
    </div>

    <div class="col-md-12 mb-0 mt-2">
        <label class="form-label">@lang('Description')</label>
        <textarea type="text" class="form-control" placeholder="@lang('Event Description')" wire:model='description'></textarea>
        @include('admin.errors', ['property' => 'description'])
    </div>
    <div class="form-check form-switch mb-2">
        <input class="form-check-input" type="checkbox" checked />
        <label class="form-check-label" wire:model='is_active'>@lang('Is Active')</label>
        {{-- <input type="text" class="form-control" wire:model='is_active' /> --}}
        @include('admin.errors', ['property' => 'is_active'])
    </div>

</x-update-modal>
