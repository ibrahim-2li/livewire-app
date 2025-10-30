<form wire:submit.prevent='submit' class='space-y-5 text-right'>
    @if (session()->has('message'))
        <div class="alert alert-primary alert-dismissible fade show bg-green-600" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div>
        <label class="block text-gray-800 font-semibold mb-2" for="name">@lang('Name')</label>
        <input type="text" wire:model='name'
            class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500"
            placeholder="@lang('Your Name')">
        @include('admin.errors', ['property' => 'name'])
    </div>
    <div>
        <label class="block text-gray-800 font-semibold mb-2" for="name">@lang('Email')</label>
        <input type="email" wire:model='email'
            class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500"
            placeholder="@lang('Your Email')">
        @include('admin.errors', ['property' => 'email'])
    </div>
    <div class="col-12">
        <div class="form-floating">
            <label class="block text-gray-800 font-semibold mb-2" for="name">@lang('Subject')</label>

            <input type="text" wire:model='subject'
                class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500"
                placeholder="@lang('Subject')">
        </div>
        @include('admin.errors', ['property' => 'subject'])
    </div>
    <div class="col-12">
        <label class="block text-gray-800 font-semibold mb-2" for="name">@lang('Message')</label>

        <div class="form-floating">
            <textarea class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500"
                wire:model='message' placeholder="@lang('Leave a message here')" style="height: 100px"></textarea>
        </div>
        @include('admin.errors', ['property' => 'message'])
    </div>
    <div class="col-12">
        <button type="submit"
            class="w-full bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-paper-plane ml-2"></i>
            @lang('Send Message')
        </button>
    </div>
</form>


{{-- <form wire:submit.prevent='submit' class="space-y-5 text-right">
    @if (session()->has('message'))
        <span wire:loading.delay.longest class="alert alert-success alert-dismissible" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </span>
    @endif
    <div>
        <label class="block text-gray-800 font-semibold mb-2" for="name">@lang('Name')</label>
        <input type="text" id="name" name="name" placeholder="اكتب اسمك"
            class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500">
    </div>

    <div>
        <label class="block text-gray-800 font-semibold mb-2" for="email">@lang('Email')
        </label>
        <input type="email" id="email" name="email" placeholder="example@email.com"
            class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500">
    </div>

    <div>
        <label class="block text-gray-800 font-semibold mb-2" for="subject">@lang('Subject')</label>
        <input type="text" id="subject" name="subject" placeholder="@lang('Subject')"
            class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500">
    </div>

    <div>
        <label class="block text-gray-800 font-semibold mb-2" for="message">@lang('Message')</label>
        <textarea id="message" name="message" rows="5" placeholder="اكتب رسالتك هنا..."
            class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
    </div>

    <button type="submit"
        class="w-full bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
        <i class="fas fa-paper-plane ml-2"></i>
        @lang('Send Message')
    </button>
</form> --}}
