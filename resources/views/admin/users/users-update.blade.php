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
    <div class="col-md-8 mb-0">
        <label class="form-label">@lang('Role')</label>

        <select class="form-control" wire:model="role">
              <option value="">اختر صلاحية</option>
            @foreach (\App\Models\Admin::ROLES as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
            @endforeach
        </select>

        @include('admin.errors', ['property' => 'role'])
    </div>
    
    <div class="col-md-6 mb-0">
        <label class="form-label">@lang('Job Title')</label>
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
        <select class="form-control" wire:model="gender">
            <option value="">اختر النوع</option>
            <option value="male">@lang('Male')</option>
            <option value="female">@lang('Female')</option>
        </select>
        @include('admin.errors', ['property' => 'gender'])
    </div>
</x-update-modal>
