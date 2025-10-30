<x-update-modal title='تعديل المستخدم'>
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
        <label class="form-label">@lang('Password')</label>
        <input type="password" class="form-control" placeholder="@lang('Password')" wire:model='password' />
        @include('admin.errors', ['property' => 'password'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Title')</label>
        <input type="text" class="form-control" placeholder="@lang('Title')" wire:model='job_title' />
        @include('admin.errors', ['property' => 'job_title'])
    </div>

    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Phone')</label>
        <input type="text" class="form-control" placeholder="@lang('Phone')" wire:model='phone' />
        @include('admin.errors', ['property' => 'phone'])
    </div>
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Gender')</label>
        <input type="text" class="form-control" placeholder="@lang('Gender')" wire:model='gender' />
        @include('admin.errors', ['property' => 'gender'])
    </div>
</x-update-modal>
