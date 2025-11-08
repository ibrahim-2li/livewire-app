<form class="mb-3" wire:submit.prevent='submit'>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد
            الإلكتروني</label>
        <input type="text"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
            placeholder="أدخل الايميل الخاص بك" autofocus wire:model='email'value="{{ old('email') }}" />
        {{-- @error('email')
          <span class="text-danger">{{ $message}}</span>
      @enderror --}}
        <div class="text-orange-600 hover:text-orange-700 font-medium">
            @error('email')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div>

        <label class="block text-sm font-medium text-gray-700 mb-2" for="password">كلمة السر</label>


        <input type="password"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2
                focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            aria-describedby="password" wire:model='password' />
        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

        <div class="text-orange-600 hover:text-orange-700 font-medium">
            @error('password')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="remember" />
            <label class="form-check-label"> تزكرني </label>
        </div>
    </div>
    <div class="mb-3">
        <button
            class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-6 rounded-xl transition-colors duration-300 transform hover:scale-105 shadow-lg"
            type="submit" wire:loading.attr='disabled'>
            <span wire:loading.remove>دخول</span>
            <div class="text-center" wire:loading wire:target='submit'>
                <span class="spinner-border spinner-border-sm text-white role="status">
                    <span class="visually-hidden">Loading...</span>
                </span>
            </div>
        </button>
    </div>
</form>
