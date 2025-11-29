<div class="card">
    <h5 class="card-header">@lang('Update Password')</h5>
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible my-success-alert" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form wire:submit.prevent="updatePassword">
            <div class="mb-3">
                <label class="form-label" for="current_password">@lang('Current Password')</label>
                <input class="form-control @error('current_password') is-invalid @enderror" type="password" wire:model="current_password" id="current_password" />
                @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">@lang('New Password')</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" wire:model="password" id="password" />
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password_confirmation">@lang('Confirm New Password')</label>
                <input class="form-control" type="password" wire:model="password_confirmation" id="password_confirmation" />
            </div>

            <button type="submit" class="btn btn-danger" wire:loading.attr="disabled">
                <span wire:loading.remove>@lang('Update Password')</span>
                <span wire:loading>@lang('Updating...')</span>
            </button>
        </form>
    </div>
</div>
