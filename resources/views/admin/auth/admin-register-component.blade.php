<form class="space-y-6" method="POST" action="{{ route('admin.register.store') }}">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم
            الكامل</label>
        <input type="text" id="name" name="name" value="{{ session('attendee_name', old('name')) }}" autofocus
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
            placeholder="أدخل اسمك الكامل" required>
        @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
            placeholder="أدخل بريدك الإلكتروني" required />
        <div class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div>

    </div>
    <div class=<label for="phone" class="block text-sm font-medium text-gray-700 mb-2">رقم
        الهاتف</label>

        <div class="input-group input-group-merge">
            <span class="input-group-text">KSA (+966)</span>
            <input type="number" id="phone" name="phone" value="{{ old('phone') }}"
                class="form-control form-control w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                placeholder="500 000 000" max="999999999" required />
        </div>
        {{-- <span class="input-group-text">KSA (+966)</span>
        <input minlength="10" maxlength="10" type="number" id="phone_numbe" name="phone_numbe" wire:model='phone'
            value="{{ session('attendee_phone_number', old('phone')) }}"
            class="form-control w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
            placeholder="أدخل رقم الهاتف" max="999999999" required> --}}
        @error('phone')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Job Title Field -->
    <div>
        <label for="job_title" class="block text-sm font-medium text-gray-700 mb-2">المسمى
            الوظيفي</label>
        <input type="text" id="job_title" name="job_title"
            value="{{ session('attendee_job_title', old('job_title')) }}"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
            placeholder="أدخل المسمى الوظيفي" required>
        @error('job_title')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Gender Field -->
    <div>
        <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">الجنس</label>
        <select id="gender" name="gender"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
            required>
            <option value="">اختر الجنس</option>
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ذكر</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>أنثى</option>
        </select>
        @error('gender')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password Field -->
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">كلمة
            المرور</label>
        <input type="password" id="password" name="password"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
            placeholder="أدخل كلمة المرور" required>
        @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Confirm Password Field -->
    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">تأكيد كلمة
            المرور</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
            placeholder="أعد إدخال كلمة المرور" required>
        @error('password_confirmation')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit"
        class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-6 rounded-xl transition-colors duration-300 transform hover:scale-105 shadow-lg">
        <i class="fas fa-user-plus ml-2"></i>
        إنشاء الحساب
    </button>




    {{-- <div class="text-center">
        <span>Already have an account? </span>
        <a href="{{ route('admin.login') }}">
            <span>Sign in instead</span>
        </a>
    </div> --}}
</form>
