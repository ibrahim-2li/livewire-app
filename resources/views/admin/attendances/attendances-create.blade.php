<x-create-modal title='إضافة حضور'>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Country')</label>
        <select id="country" name="country" class="form-control" wire:model='country'>
            <option value="">@lang('Select Country')</option>
            <option value="Sudan" {{ old('country') == 'Sudan' ? 'selected' : '' }}>
                @lang('Sudan')
            </option>
            <option value="Egypt" {{ old('country') == 'Egypt' ? 'selected' : '' }}>
                @lang('Egypt')</option>
            </option>
            <option value="Saudi Arabia" {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>@lang('Saudi Arabia')
            </option>
            <option value="Qatar" {{ old('country') == 'Qatar' ? 'selected' : '' }}>
                @lang('Qatar')
            </option>
            {{-- <option value="United Arab Emirates" {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>
                @lang('United Arab Emirates')
            </option> --}}
        </select>
        @include('admin.errors', ['property' => 'country'])
    </div>
    {{-- <div class="col-md-6 mb-0">
        <label for="emailBasic" class="form-label">@lang('Name')</label>
        <input type="text" class="form-control" placeholder="@lang('Name')" wire:model='name' />
        @include('admin.errors', ['property' => 'name'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Email')</label>
        <input type="text" class="form-control" placeholder="@lang('Email')" wire:model='email' />
        @include('admin.errors', ['property' => 'email'])
    </div> --}}
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Users')</label>
        <select type="text" class="form-control" wire:model='admin_id'>
            <option value="">@lang('Select User')</option>
            @if (count($users) > 0)
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" wire:key="user-{{ $user->id }}">{{ $user->email }}
                    </option>
                @endforeach
            @endif
        </select>
        @include('admin.errors', ['property' => 'event_id'])
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

</x-create-modal>
