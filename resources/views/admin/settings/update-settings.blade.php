<form class="row" wire:submit.prevent='submit'>
    @if (session()->has('message'))
        <div class="alert alert-success my-success-alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="col-md-6">
        <label class="form-label">@lang('Name')</label>
        <input type="text" class="form-control" placeholder="@lang('Name')" wire:model='settings.name' />
        @error('settings.name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">@lang('Email')</label>
        <input type="text" class="form-control" placeholder="@lang('Email')" wire:model='settings.email' />
        @error('settings.email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Address')</label>
        <input type="text" class="form-control" placeholder="@lang('Address')" wire:model='settings.address' />
        @error('settings.address')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Phone')</label>
        <input type="text" class="form-control" placeholder="@lang('Phone Number')" wire:model='settings.phone' />
        @error('settings.phone')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Facebook')</label>
        <input type="text" class="form-control" placeholder="@lang('Facebook')" wire:model='settings.facebook' />
        @error('settings.facebook')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Twitter')</label>
        <input type="text" class="form-control" placeholder="@lang('Twitter')" wire:model='settings.twitter' />
        @error('settings.twitter')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('LinkedIn')</label>
        <input type="text" class="form-control" placeholder="@lang('LinkedIn')" wire:model='settings.linkedin' />
        @error('settings.linkedin')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Instgram')</label>
        <input type="text" class="form-control" placeholder="@lang('Instgram')" wire:model='settings.instgram' />
        @error('settings.instgram')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Youtube')</label>
        <input type="text" class="form-control" placeholder="@lang('Youtube')" wire:model='settings.youtube' />
        @error('settings.youtube')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">@lang('Telegram')</label>
        <input type="text" class="form-control" placeholder="@lang('Telegram')" wire:model='settings.telegram' />
        @error('settings.telegram')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    @if(!auth()->user()->isSupervisor())
    <div class="col-md-12 mt-3">
        <button class="btn btn-primary">@lang('Submit')</button>
    </div>
    @endif
</form>
