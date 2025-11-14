<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }} - تفاصيل الحدث</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Arabic', sans-serif;
        }

        .rtl {
            direction: rtl;
        }

        .ltr {
            direction: ltr;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#fc7922',
                        secondary: '#ff8c42',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-orange-50 via-white to-orange-100 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-lg border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('events.index') }}"
                    class="flex items-center text-gray-700 hover:text-orange-600 transition-colors duration-300">
                    <i class="fas fa-arrow-right ml-2"></i>
                    <span>العودة إلى الأحداث</span>
                </a>
                <div class="flex items-center space-x-4">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $event->is_active ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' }}">
                        <i class="fas fa-circle ml-1 text-xs"></i>
                        {{ $event->is_active ? 'نشط' : 'غير نشط' }}
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->

    <!-- Event Details -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Event Details Card -->
                    <div class="bg-white backdrop-blur-lg rounded-2xl p-8 border border-gray-200 shadow-lg">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">تفاصيل الحدث</h2>

                        <div class="space-y-6">
                            <!-- Date & Time -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex items-start space-x-4">
                                    <div class="bg-blue-100 p-3 rounded-xl">
                                        <i class="fas fa-calendar text-blue-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 mb-1">تاريخ البداية</h3>
                                        <p class="text-gray-700 text-lg">{{ $event->start_date->format('l, F j, Y') }}
                                        </p>
                                        <p class="text-gray-500">{{ $event->start_date->format('g:i A') }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div class="bg-orange-100 p-3 rounded-xl">
                                        <i class="fas fa-clock text-orange-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 mb-1">تاريخ النهاية</h3>
                                        <p class="text-gray-700 text-lg">{{ $event->end_date->format('l, F j, Y') }}
                                        </p>
                                        <p class="text-gray-500">{{ $event->end_date->format('g:i A') }}</p>
                                    </div>
                                </div>

                            </div>

                            <!-- Location -->
                            @if ($event->location)
                                <div class="flex items-start space-x-4">
                                    <div class="bg-red-100 p-3 rounded-xl">
                                        <i class="fas fa-map-marker-alt text-red-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 mb-1">الموقع</h3>
                                        <p class="text-gray-700 text-lg">{{ $event->location }}</p>
                                        <button
                                            class="mt-2 text-blue-600 hover:text-blue-500 transition-colors duration-300">
                                            <i class="fas fa-directions mr-1"></i>
                                            <a href="{{ $event->map }}" target="blank">
                                                Get Directions
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <!-- Duration -->
                            <div class="flex items-start space-x-4">
                                <div class="bg-green-100 p-3 rounded-xl">
                                    <i class="fas fa-hourglass-half text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">المدة</h3>
                                    <p class="text-gray-700 text-lg">
                                        {{ $event->start_date->diffForHumans($event->end_date, true) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Section -->
                    <div class="bg-white backdrop-blur-lg rounded-2xl p-8 border border-gray-200 shadow-lg">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">حول هذا الحدث</h2>
                        <div class="prose max-w-none">
                            <p class="text-gray-700 leading-relaxed mb-4">
                                {{ $event->description ?: 'هذا حدث مثير يجمع المهنيين والمتحمسين والعقول الفضولية من خلفيات مختلفة. سواء كنت تبحث عن التواصل أو تعلم مهارات جديدة أو ببساطة قضاء وقت رائع، هذا الحدث يحتوي على شيء للجميع.' }}
                            </p>
                            <p class="text-gray-700 leading-relaxed">
                                دعوة للانضمام إلى حدث قيم للتواصل والنمو الشخصي.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Register Card -->
                    <div class="bg-gradient-to-br from-orange-500 to-red-400 rounded-2xl p-8 text-center">
                        <h3 class="text-2xl font-bold text-white mb-4">مستعد للانضمام؟</h3>
                        <p class="text-white mb-6">
                            سجل الآن لتأمين مكانك في هذا الحدث المذهل!
                        </p>

                        @if (session('success'))
                            <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">
                                <i class="fas fa-check-circle ml-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Debug: Check authentication status --}}
                        @if (auth('admin')->check())
                            <div class="mb-4 p-2 bg-green-100 text-green-800 rounded text-sm">
                                Logged in as: {{ auth('admin')->user()->name }} ({{ auth('admin')->user()->email }})
                            </div>
                            <form action="{{ route('events.existing_register', $event) }}" method="POST"
                                class="space-y-4">
                                @csrf
                                <div>
                                    @php
                                        $name = auth('admin')->check() ? auth('admin')->user()->name : old('name');
                                        $email = auth('admin')->check() ? auth('admin')->user()->email : old('email');
                                    @endphp
                                    <input type="text" name="name" value="{{ $name }}" readonly
                                        placeholder="الاسم الكامل"
                                        class="w-full px-4 py-3 rounded-xl border-0 bg-white/90 backdrop-blur-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-orange-500 transition-all duration-300"
                                        required>
                                </div>
                                <div>
                                    <input type="email" name="email" value="{{ $email }}" readonly
                                        placeholder="البريد الإلكتروني"
                                        class="w-full px-4 py-3 rounded-xl border-0 bg-white/90 backdrop-blur-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-orange-500 transition-all duration-300"
                                        required>
                                </div>
                                <div>

                                    <select id="country" name="country"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                        required>
                                        <option value="">@lang('Where are you joining from?')</option>
                                        <option value="Sudan" {{ old('country') == 'Sudan' ? 'selected' : '' }}>
                                            @lang('Sudan')
                                        </option>
                                        <option value="Egypt" {{ old('country') == 'Egypt' ? 'selected' : '' }}>
                                            @lang('Egypt')</option>
                                        </option>
                                        <option value="Saudi Arabia"
                                            {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>@lang('Saudi Arabia')
                                        </option>
                                        <option value="Qatar" {{ old('country') == 'Qatar' ? 'selected' : '' }}>
                                            @lang('Qatar')
                                        </option>
                                        {{-- <option value="United Arab Emirates"
                                            {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>
                                            @lang('United Arab Emirates')
                                        </option> --}}
                                    </select>

                                </div>
                                <button type="submit"
                                    class="w-full bg-white text-orange-600 font-bold py-4 px-6 rounded-xl hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-ticket-alt ml-2"></i>
                                    سجل الآن
                                </button>
                            </form>
                        @else
                            <div class="mb-4 p-2 bg-yellow-100 text-yellow-800 rounded text-sm">
                                Not logged in
                            </div>
                            <form action="{{ route('events.register', $event) }}" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    @php
                                        $name = auth('admin')->check() ? auth('admin')->user()->name : old('name');
                                        $email = auth('admin')->check() ? auth('admin')->user()->email : old('email');
                                    @endphp
                                    <input type="text" name="name" value="{{ $name }}"
                                        placeholder="الاسم الكامل"
                                        class="w-full px-4 py-3 rounded-xl border-0 bg-white/90 backdrop-blur-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-orange-500 transition-all duration-300"
                                        required>
                                </div>
                                <div>
                                    <input type="email" name="email" value="{{ $email }}"
                                        placeholder="البريد الإلكتروني"
                                        class="w-full px-4 py-3 rounded-xl border-0 bg-white/90 backdrop-blur-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-orange-500 transition-all duration-300"
                                        required>
                                </div>
                                <div>

                                    <select id="country" name="country"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                        required>
                                        <option value="">@lang('Where are you joining from?')</option>
                                        <option value="Sudan" {{ old('country') == 'Sudan' ? 'selected' : '' }}>
                                            @lang('Sudan')
                                        </option>
                                        <option value="Egypt" {{ old('country') == 'Egypt' ? 'selected' : '' }}>
                                            @lang('Egypt')</option>
                                        </option>
                                        <option value="Saudi Arabia"
                                            {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>@lang('Saudi Arabia')
                                        </option>
                                        <option value="Qatar" {{ old('country') == 'Qatar' ? 'selected' : '' }}>
                                            @lang('Qatar')
                                        </option>
                                        {{-- <option value="United Arab Emirates"
                                            {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>
                                            @lang('United Arab Emirates')
                                        </option> --}}
                                    </select>

                                </div>
                                <button type="submit"
                                    class="w-full bg-white text-orange-600 font-bold py-4 px-6 rounded-xl hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-ticket-alt ml-2"></i>
                                    سجل الآن
                                </button>
                            </form>
                        @endif



                        <p class="text-white text-sm mt-4">
                            تسجيل مجاني • رمز QR متوفر
                        </p>
                    </div>

                    <div class="bg-white backdrop-blur-lg rounded-2xl p-6 border border-gray-200 shadow-lg mt-4">

                        <h3 class="text-lg font-semibold text-gray-900 mb-4"> تابعنا على</h3>

                        <div class="flex space-x-3">
                            <div></div>
                            @if ($settings->twitter)
                                <button
                                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded-lg transition-colors duration-300">
                                    <a href="{{ $settings->twitter }}" target="blank"> <i
                                            class="fab fa-twitter"></i></a>
                                </button>
                            @endif

                            @if ($settings->linkedin)
                                <button
                                    class="flex-1 bg-blue-700 hover:bg-blue-800 text-white py-2 px-3 rounded-lg transition-colors duration-300">
                                    <a href="{{ $settings->linkedin }}" target="blank"><i
                                            class="fab fa-linkedin"></i></a>
                                </button>
                            @endif
                            @if ($settings->youtube)
                                <button
                                    class="flex-1 bg-blue-700 hover:bg-blue-800 text-white py-2 px-3 rounded-lg transition-colors duration-300">
                                    <a href="{{ $settings->youtube }}" target="blank"><i
                                            class="fab fa-youtube"></i></a>
                                </button>
                            @endif
                            @if ($settings->telegram)
                                <button
                                    class="flex-1 bg-blue-700 hover:bg-blue-800 text-white py-2 px-3 rounded-lg transition-colors duration-300">
                                    <a href="{{ $settings->telegram }}" target="blank"><i
                                            class="fab fa-telegram"></i></a>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-50 backdrop-blur-lg border-t border-gray-200 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <p class="text-gray-600">© 2024 منصة الأحداث. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>
</body>

</html>
