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
    {{-- <section class="relative overflow-hidden py-16">
        <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-secondary/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Event Image -->
                <div class="order-2 lg:order-1">
                    <div class="relative">
                        <div
                            class="w-full h-96 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-2xl">
                            <i class="fas fa-calendar-alt text-white text-8xl"></i>
                        </div>
                        <div
                            class="absolute -bottom-6 -right-6 w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center shadow-xl">
                            <i class="fas fa-ticket-alt text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Event Info -->
                <div class="order-1 lg:order-2 space-y-6">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                            {{ $event->title }}
                        </h1>
                        <div class="flex items-center text-gray-300 mb-6">
                            <i class="fas fa-user-circle text-gray-400 mr-3"></i>
                            <span class="text-lg">Organized by {{ $event->user->name }}</span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                        <p class="text-gray-300 leading-relaxed">
                            {{ $event->description ?: 'Join us for an amazing event that will inspire and connect you with like-minded individuals. This is a great opportunity to network, learn, and have fun!' }}
                        </p>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white/10 backdrop-blur-lg rounded-xl p-4 border border-white/20 text-center">
                            <i class="fas fa-users text-purple-400 text-2xl mb-2"></i>
                            <p class="text-white font-semibold text-lg">{{ $event->total_attendees }}</p>
                            <p class="text-gray-400 text-sm">Attendees</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-lg rounded-xl p-4 border border-white/20 text-center">
                            <i class="fas fa-check-circle text-green-400 text-2xl mb-2"></i>
                            <p class="text-white font-semibold text-lg">{{ $event->checked_in_count }}</p>
                            <p class="text-gray-400 text-sm">Checked In</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

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
                                            <a href="https://maps.app.goo.gl/9CJStLS45EB4cqvn8" target="blank">
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
                        @else
                            <div class="mb-4 p-2 bg-yellow-100 text-yellow-800 rounded text-sm">
                                Not logged in
                            </div>
                        @endif

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
                                    <option value="United Arab Emirates"
                                        {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>
                                        @lang('United Arab Emirates')
                                    </option>
                                </select>

                            </div>
                            <button type="submit"
                                class="w-full bg-white text-orange-600 font-bold py-4 px-6 rounded-xl hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-ticket-alt ml-2"></i>
                                سجل الآن
                            </button>
                        </form>


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
