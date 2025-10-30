<x-show-modal-sm title="تفاصيل المستخدم">

    <div class="mx-auto d-flex justify-content-start diaplay-inline">
        <div>
            <h5>@lang('Name') : {{ $name }}</h5>
            <h6>@lang('Job Title') : {{ $job_title }}</h6>
            <h6>@lang('Phone') : {{ $phone }}</h6>
            <h6>@lang('Email') : {{ $email }}</h6>
            <h6>@lang('Gender') : {{ $gender }}</h6>

        </div>
        {{-- <img class="mx-auto"  src="{{  asset($image) }}" width="auto" height="300px"> --}}
    </div>
</x-show-modal-sm>
