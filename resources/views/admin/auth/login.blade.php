<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - منصة الأحداث</title>
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
                        منصة الأحداث
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
                <!-- Left Side - Welcome Message -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-8 lg:p-12 text-white">
                    <div class="h-full flex flex-col justify-center">
                        <div class="mb-8">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-6">
                                <i class="fas fa-user text-2xl"></i>
                            </div>
                            <h1 class="text-3xl font-bold mb-4">مرحباً بك مرة أخرى!</h1>
                            <p class="text-orange-100 text-lg leading-relaxed">
                                سجل دخولك للوصول إلى لوحة التحكم وإدارة تسجيلاتك في الأحداث.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                            <h3 class="text-lg font-semibold mb-4">مميزات الحساب</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-200 ml-3"></i>
                                    <span class="text-white">عرض جميع تسجيلاتك</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-200 ml-3"></i>
                                    <span class="text-white">إدارة ملفك الشخصي</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-200 ml-3"></i>
                                    <span class="text-white">تحميل رموز QR</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-200 ml-3"></i>
                                    <span class="text-white">متابعة أحداثك</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="p-8 lg:p-12">
                    <div class="max-w-md mx-auto">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">تسجيل الدخول</h2>
                        <p class="text-gray-600 mb-8">أدخل بياناتك للوصول إلى حسابك</p>

                        <!-- Display Error Messages -->
                        @if ($errors->any())
                            <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4">
                                <div class="flex">
                                    <i class="fas fa-exclamation-circle text-red-400 mt-0.5 ml-3"></i>
                                    <div>
                                        <h3 class="text-sm font-medium text-red-800">خطأ في تسجيل الدخول</h3>
                                        <div class="mt-2 text-sm text-red-700">
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Display Success Messages -->
                        @if (session('success'))
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

                        {{-- <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد
                                    الإلكتروني</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    placeholder="أدخل بريدك الإلكتروني" required autofocus>
                                @error('email')
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

                            <!-- Remember Me -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember" name="remember" type="checkbox"
                                        class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                                    <label for="remember" class="mr-2 block text-sm text-gray-900">
                                        تذكرني
                                    </label>
                                </div>
                                <div class="text-sm">
                                    <a href="#" class="font-medium text-orange-600 hover:text-orange-500">
                                        نسيت كلمة المرور؟
                                    </a>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-6 rounded-xl transition-colors duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-sign-in-alt ml-2"></i>
                                تسجيل الدخول
                            </button>
                        </form> --}}
                        @livewire('admin.auth.admin-login-component')

                        <!-- Register Link -->
                        <div class="mt-8 text-center">
                            <p class="text-gray-600">
                                ليس لديك حساب؟
                                <a href="{{ route('admin.register') }}"
                                    class="text-orange-600 hover:text-orange-700 font-medium">
                                    إنشاء حساب جديد
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
