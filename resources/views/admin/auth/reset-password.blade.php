<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعادة تعيين كلمة المرور - منصة الأحداث</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    @livewireStyles
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
                        الفعاليات
                    </a>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="{{ route('admin.login') }}" class="text-gray-600 hover:text-orange-600 transition-colors">
                        <i class="fas fa-sign-in-alt ml-1"></i>
                        تسجيل الدخول
                    </a>
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
                <!-- Left Side - Info -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-8 lg:p-12 text-white">
                    <div class="h-full flex flex-col justify-center">
                        <div class="mb-8">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-6">
                                <i class="fas fa-lock text-2xl"></i>
                            </div>
                            <h1 class="text-3xl font-bold mb-4">إنشاء كلمة مرور جديدة</h1>
                            <p class="text-orange-100 text-lg leading-relaxed">
                                قم بإدخال كلمة مرور جديدة آمنة لحسابك، ثم قم بتأكيدها للتأكد من كتابتها بشكل صحيح.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                            <h3 class="text-lg font-semibold mb-4">نصائح لكلمة مرور قوية</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-200 ml-3"></i>
                                    <span class="text-white">استخدم حروفاً كبيرة وصغيرة وأرقاماً ورموزاً</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-200 ml-3"></i>
                                    <span class="text-white">تجنب استخدام معلومات شخصية سهلة التخمين</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-200 ml-3"></i>
                                    <span class="text-white">لا تشارك كلمة المرور مع أي شخص</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Reset Form -->
                <div class="p-8 lg:p-12">
                    <div class="max-w-md mx-auto">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">إعادة تعيين كلمة المرور</h2>
                        <p class="text-gray-600 mb-8">أدخل بريدك الإلكتروني واختر كلمة مرور جديدة</p>

                        <!-- Display Error Messages -->
                        @if ($errors->any())
                            <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4">
                                <div class="flex">
                                    <i class="fas fa-exclamation-circle text-red-400 mt-0.5 ml-3"></i>
                                    <div>
                                        <h3 class="text-sm font-medium text-red-800">حدث خطأ</h3>
                                        <div class="mt-2 text-sm text-red-700">
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Display Status Messages -->
                        @if (session('status'))
                            <div class="mb-6 bg-green-50 border border-green-200 rounded-xl p-4">
                                <div class="flex">
                                    <i class="fas fa-check-circle text-green-400 mt-0.5 ml-3"></i>
                                    <div>
                                        <h3 class="text-sm font-medium text-green-800">تم بنجاح</h3>
                                        <div class="mt-2 text-sm text-green-700">
                                            {{ session('status') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    البريد الإلكتروني
                                </label>
                                <input id="email" type="email" name="email"
                                    value="{{ old('email', $request->email) }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    required autofocus autocomplete="username">
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    كلمة المرور الجديدة
                                </label>
                                <input id="password" type="password" name="password"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    required autocomplete="new-password">
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation"
                                    class="block text-sm font-medium text-gray-700 mb-2">
                                    تأكيد كلمة المرور
                                </label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    required autocomplete="new-password">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-6 rounded-xl transition-colors duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-undo ml-2"></i>
                                تحديث كلمة المرور
                            </button>

                            <!-- Login Link -->
                            <div class="mt-6 text-center">
                                <p class="text-gray-600">
                                    تذكرت كلمة المرور؟
                                    <a href="{{ route('admin.login') }}"
                                        class="text-orange-600 hover:text-orange-700 font-medium">
                                        تسجيل الدخول
                                    </a>
                                </p>
                            </div>
                        </form>
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

    @livewireScripts
</body>

</html>


