<x-update-modal title='تعديل '>
    <div class="col-md-6 mb-0">
        <label for="emailBasic" class="form-label">@lang('Name')</label>
        <input type="text" class="form-control" placeholder="@lang('Name')" wire:model='name' />
        @include('admin.errors', ['property' => 'name'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Email')</label>
        <input type="text" class="form-control" placeholder="@lang('Email')" wire:model='email' />
        @include('admin.errors', ['property' => 'email'])
    </div>

    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Event')</label>
        <select type="text" class="form-control" wire:model='event_id'>
            <option value="">@lang('Select Event')</option>
            @if (count($events) > 0)
                @foreach ($events as $event)
                    <option value="{{ $event->id }}" wire:key="event-{{ $event->id }}">{{ $event->title }}
                    </option>
                @endforeach
            @endif
        </select>
        @include('admin.errors', ['property' => 'event_id'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Country')</label>
        <select id="country" name="country" class="form-control" wire:model='country'>
            <option value="">@lang('Select Country')</option>
            @foreach ($countries as $country)
                <option value="{{ $country }}">{{ $country }}</option>
            @endforeach
        </select>
        @include('admin.errors', ['property' => 'country'])
    </div>
</x-update-modal>
