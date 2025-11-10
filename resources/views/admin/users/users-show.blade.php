<x-show-modal title="تفاصيل المستخدم">
    <div class="card shadow-sm border-0 rounded-4 p-4 bg-light">
        <div class="d-flex align-items-start gap-4 flex-wrap">

            <div class="flex-grow-1 w-100">
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold text-primary">@lang('Name')</div>
                    <div class="col-md-8 text-dark">{{ $name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold text-primary">@lang('Job Title')</div>
                    <div class="col-md-8">{{ $job_title }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold text-primary">@lang('Phone')</div>
                    <div class="col-md-8">{{ $phone }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold text-primary">@lang('Email')</div>
                    <div class="col-md-8">{{ $email }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold text-primary">@lang('Gender')</div>
                    <div class="col-md-8">{{ $gender }}</div>
                </div>
            </div>
        </div>
    </div>

</x-show-modal>
