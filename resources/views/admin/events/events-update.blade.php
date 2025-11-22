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

    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Limits')</label>
        <input type="number" inputmode="numeric" class="form-control" placeholder="@lang('Event Registration Limits')"
            wire:model='limits' />
        @include('admin.errors', ['property' => 'limits'])
    </div>

    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Image')</label>
        <input type="file" class="form-control" wire:model='newImage' />
        @include('admin.errors', ['property' => 'newImage'])
        
        @if ($newImage)
            <div class="mt-2">
                <img src="{{ $newImage->temporaryUrl() }}" width="100" class="rounded">
            </div>
        @elseif ($image)
            <div class="mt-2">
                <img src="{{ asset($image) }}" width="100" class="rounded">
            </div>
        @endif
    </div>

    <div class="col-md-12 mb-0 mt-2">
        <label class="form-label">@lang('Description')</label>
        <textarea type="text" class="form-control" placeholder="@lang('Event Description')" wire:model='description'></textarea>
        @include('admin.errors', ['property' => 'description'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Start Date')</label>
        <input type="datetime-local" class="form-control" wire:model='start_date' />
        @include('admin.errors', ['property' => 'start_date'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('End Date')</label>
        <input type="datetime-local" class="form-control" wire:model='end_date' />
        @include('admin.errors', ['property' => 'end_date'])
    </div>
    <div class="form-check form-switch mb-2">
        <input class="form-check-input" type="checkbox" wire:model="is_active" id="is_active">
        <label class="form-check-label" for="is_active">@lang('Is Active')</label>
        @include('admin.errors', ['property' => 'is_active'])
    </div>
    <div class="col-md-12 mb-0 mt-2">
        <label class="form-label">@lang('Message')</label>
        <textarea type="text" class="form-control" placeholder="@lang('Event Message Sent with  Email')" wire:model='message'></textarea>
        @include('admin.errors', ['property' => 'message'])
    </div>
</x-update-modal>
