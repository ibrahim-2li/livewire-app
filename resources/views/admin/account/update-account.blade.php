<div>
    <div class="card mb-4">
        <h5 class="card-header">@lang('Profile Details')</h5>
        <!-- Account -->
        {{-- @livewire('admin.account.update-account-image') --}}
        <hr class="my-0" />
        <div class="card-body">
            <form wire:submit.prevent='submit'>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">@lang('Name')</label>
                        <input class="form-control" type="text" wire:model='user.name'
                            placeholder="@lang('Name')" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">@lang('Email')</label>
                        <input class="form-control" type="text" wire:model='user.email'
                            placeholder="john.doe@example.com" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">@lang('Phone Number')</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">(+)</span>
                            <input class="form-control" wire:model='user.phone' placeholder="500 000 000" type="tel"
                                maxlength="14" pattern="\+966\d{9}" inputmode="tel" />
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="job_title" class="form-label">@lang('Job Title')</label>
                        <input type="text" class="form-control" wire:model='user.job_title' placeholder="Manager" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="gender" class="form-label">@lang('Gender')</label>
                        <select class="form-control" wire:model='user.gender'>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="job_title" class="form-label">@lang('Nationality')</label>
                        <input type="text" class="form-control" wire:model='user.nationality'
                            placeholder="Nationality" />
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">@lang('Save changes')</button>
                    <button type="reset" class="btn btn-outline-secondary">@lang('Cancel')</button>
                </div>
            </form>
        </div>
        <!-- /Account -->
    </div>
    @livewire('admin.account.delete-account')
</div>
