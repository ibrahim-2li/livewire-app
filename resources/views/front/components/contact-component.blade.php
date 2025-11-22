<form wire:submit.prevent='submit' class='space-y-5 text-right'>
    @if (session()->has('message'))
        <div x-data="{ show: true }" 
             x-init="setTimeout(() => show = false, 3000)" 
             x-show="show"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="transform -translate-x-full opacity-0"
             x-transition:enter-end="transform translate-x-0 opacity-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="transform translate-x-0 opacity-100"
             x-transition:leave-end="transform -translate-x-full opacity-0"
             class="fixed top-6 left-6 z-50 max-w-md w-full">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-r-4 border-green-500">
                <!-- Progress Bar -->
                <div class="h-1 bg-gradient-to-r from-green-500 to-emerald-500 toast-progress" style="animation-duration: 3s;"></div>

                <div class="p-6">
                    <div class="flex items-start gap-4">
                        <!-- Icon -->
                        <div class="flex-shrink-0">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center checkmark-icon shadow-lg">
                                <i class="fas fa-check text-white text-xl"></i>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">
                                <i class="fas fa-check-circle text-green-500 ml-2"></i>
                                @lang('Success')
                            </h3>
                            <p class="text-gray-700 leading-relaxed">
                                {{ session('message') }}
                            </p>
                        </div>

                        <!-- Close Button -->
                        <button @click="show = false" type="button"
                            class="flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
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
