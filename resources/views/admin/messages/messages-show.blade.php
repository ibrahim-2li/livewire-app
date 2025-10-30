<x-show-modal title="تفاصيل الرسالة">
    <div class="flex justify-center items-center">
        <h6 class="text-bold">@lang('Name') : {{ $name }}</h6>
        <h6 class="text-bold">@lang('Email') : {{ $email }}</h6>
        <h6 class="text-bold">@lang('Subject') : {{ $subject }}</h6>
        <p class="card-text">
            {{ $message }}
        </p>
    </div>
</x-show-modal>
