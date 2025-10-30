<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - منصة الأحداث</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-orange-50 to-orange-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <a href="{{ route('events.index') }}" class="text-2xl font-bold text-orange-600">
                        <i class="fas fa-calendar-alt ml-2"></i>
                        @lang('Events')
                    </a>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="{{ route('events.index') }}" class="text-gray-600 hover:text-orange-600 transition-colors">
                        <i class="fas fa-home ml-1"></i>
                        الرئيسية
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="grid lg:grid-cols-2 gap-0">
                <!-- Left Side - Success Message -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-8 lg:p-12 text-white">
                    <div class="h-full flex flex-col justify-center">
                        @if (session('success'))
                            <div class="mb-8">
                                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-6">
                                    <i class="fas fa-check text-2xl"></i>
                                </div>
                                <h1 class="text-3xl font-bold mb-4">{{ session('success') }}</h1>
                                <p class="text-orange-100 text-lg leading-relaxed">
                                    تم إرسال رمز QR إلى بريدك الإلكتروني. يمكنك الآن إنشاء حساب للوصول إلى جميع الأحداث
                                    والتحكم في تسجيلاتك.
                                </p>
                            </div>
                        @endif

                        <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                            <h3 class="text-lg font-semibold mb-4">معلومات التسجيل</h3>
                            @if (session('attendee_name') || session('attendee_email'))
                                <div class="space-y-3">
                                    @if (session('attendee_name'))
                                        <div class="flex justify-between items-center">
                                            <span class="text-orange-200">الاسم:</span>
                                            <span class="text-white font-medium">{{ session('attendee_name') }}</span>
                                        </div>
                                    @endif
                                    @if (session('attendee_email'))
                                        <div class="flex justify-between items-center">
                                            <span class="text-orange-200">البريد الإلكتروني:</span>
                                            <span class="text-white font-medium">{{ session('attendee_email') }}</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Side - Registration Form -->
                <div class="p-8 lg:p-12">
                    <div class="max-w-md mx-auto">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">إنشاء حساب جديد</h2>
                        <p class="text-gray-600 mb-8">أكمل إنشاء حسابك للوصول إلى جميع الميزات</p>

                        <form class="space-y-6" method="POST" action="{{ route('admin.register.store') }}">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم
                                    الكامل</label>
                                <input type="text" id="name" name="name"
                                    value="{{ session('attendee_name', old('name')) }}" autofocus
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    placeholder="أدخل اسمك الكامل" required>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد
                                    الإلكتروني</label>
                                <input type="email" id="email" name="email"
                                    value="{{ session('attendee_email', old('email')) }}"
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
                            <div class=<label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                @lang('Phone Number') : like 00966512345678</label>

                                <div class="input-group input-group-merge">
                                    <input type="text" maxlength="14" pattern="\d{14}" inputmode="numeric"
                                        id="phone" name="phone" value="{{ old('phone') }}"
                                        class="form-control form-control w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                        placeholder="500 000 000" required />
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
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>أنثى
                                    </option>
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
                                <label for="password_confirmation"
                                    class="block text-sm font-medium text-gray-700 mb-2">تأكيد كلمة
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


                        {{-- @livewire('admin.auth.admin-register-component') --}}
                        {{-- <form method="POST" action="{{ route('register') }}" class="space-y-6">
                            @csrf

                            <!-- Name Field -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم
                                    الكامل</label>
                                <input type="text" id="name" name="name"
                                    value="{{ session('attendee_name', old('name')) }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    placeholder="أدخل اسمك الكامل" required>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد
                                    الإلكتروني</label>
                                <input type="email" id="email" name="email"
                                    value="{{ session('attendee_email', old('email')) }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    placeholder="أدخل بريدك الإلكتروني" required>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone Number Field -->
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">رقم
                                    الهاتف</label>

                                <input minlength="10" maxlength="10" type="number" id="phone_number"
                                    name="phone_number"
                                    value="{{ session('attendee_phone_number', old('phone_number')) }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    placeholder="أدخل رقم الهاتف" required>
                                @error('phone_number')
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
                                    <option value="male">ذكر</option>
                                    <option value="female">أنثى</option>
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
                                <label for="password_confirmation"
                                    class="block text-sm font-medium text-gray-700 mb-2">تأكيد كلمة المرور</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    placeholder="أعد إدخال كلمة المرور" required>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-6 rounded-xl transition-colors duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-user-plus ml-2"></i>
                                إنشاء الحساب
                            </button>
                        </form> --}}

                        <!-- Login Link -->
                        <div class="mt-8 text-center">
                            <p class="text-gray-600">
                                لديك حساب بالفعل؟
                                <a href="{{ route('admin.login') }}"
                                    class="text-orange-600 hover:text-orange-700 font-medium">
                                    تسجيل الدخول
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <p class="text-gray-600">© 2024 منصة الأحداث. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>
</body>

</html>
