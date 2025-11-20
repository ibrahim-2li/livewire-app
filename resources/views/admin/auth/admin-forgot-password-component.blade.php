<form class="mb-3" wire:submit.prevent='submit'>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد
            الإلكتروني</label>
        <input type="email"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
            placeholder="أدخل بريدك الإلكتروني" autofocus wire:model='email' value="{{ old('email') }}" />
        <div class="text-orange-600 hover:text-orange-700 font-medium mt-1">
            @error('email')
                {{ $message }}
            @enderror
        </div>
    </div>

    @if (session()->has('success'))
        <div class="mb-6 bg-green-50 border border-green-200 rounded-xl p-4">
            <div class="flex">
                <i class="fas fa-check-circle text-green-400 mt-0.5 ml-3"></i>
                <div>
                    <h3 class="text-sm font-medium text-green-800">تم بنجاح</h3>
                    <div class="mt-2 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="mb-3">
        <button
            class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-6 rounded-xl transition-colors duration-300 transform hover:scale-105 shadow-lg"
            type="submit" wire:loading.attr='disabled'>
            <span wire:loading.remove>
                <i class="fas fa-paper-plane ml-2"></i>
                إرسال رابط إعادة تعيين كلمة المرور
            </span>
            <div class="text-center" wire:loading wire:target='submit'>
                <span class="spinner-border spinner-border-sm text-white" role="status">
                    <span class="visually-hidden">Loading...</span>
                </span>
            </div>
        </button>
    </div>

    <div class="text-center">
        <a href="{{ route('admin.login') }}"
            class="text-orange-600 hover:text-orange-700 font-medium text-sm">
            <i class="fas fa-arrow-right ml-1"></i>
            العودة إلى تسجيل الدخول
        </a>
    </div>
</form>

