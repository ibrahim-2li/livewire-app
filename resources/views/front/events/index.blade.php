<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('Events Platform')</title>
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

        /* Toast Animation Styles */
        @keyframes slideInRight {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        @keyframes checkmark {
            0% {
                transform: scale(0);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .toast-popup {
            animation: slideInRight 0.5s ease-out;
        }

        .toast-popup.hiding {
            animation: slideOutRight 0.5s ease-in forwards;
        }

        .checkmark-icon {
            animation: checkmark 0.6s ease-out;
        }

        .toast-progress {
            animation: progressBar 5s linear forwards;
        }

        @keyframes progressBar {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
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
    <!-- Success Toast Popup -->
    @if (session('success'))
        <div id="successToast" class="toast-popup fixed top-6 left-6 z-50 max-w-md w-full">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-r-4 border-green-500">
                <!-- Progress Bar -->
                <div class="h-1 bg-gradient-to-r from-green-500 to-emerald-500 toast-progress"></div>

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
                                تم بنجاح!
                            </h3>
                            <p class="text-gray-700 leading-relaxed">
                                {{ session('success') }}
                            </p>
                        </div>

                        <!-- Close Button -->
                        <button onclick="closeToast()"
                            class="flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <nav class="bg-white/80 backdrop-blur-lg border-b border-gray-200 shadow-sm">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end rtl:justify-start space-x-2 items-center py-4">
                @auth('admin')
                    @if (auth('admin')->user()->isAdmin() || auth('admin')->user()->isScanner())
                        <a href="{{ url('/admin/') }}"
                            class="bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105">
                            @lang('Dashboard')
                        </a>
                    @else
                        <a href="{{ url('/admin/my-attendances') }}"
                            class="bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105">
                            @lang('Dashboard')
                        </a>
                    @endif
                @else
                    <a href="{{ url('/admin/login') }}"
                        class="bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 ml-4">
                        @lang('Log in')
                    </a>
                    <a href="{{ url('/admin/register') }}"
                        class="bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105">
                        @lang('Register')
                    </a>
                @endauth


            </div>
        </div>
    </nav>

    {{-- <nav class="bg-white/80 backdrop-blur-lg border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end rtl:justify-start space-x-2 items-center py-4">
                @auth('admin')
                    @if (auth('admin')->user()->isAdmin() || auth('admin')->user()->isScanner())
                        <a href="{{ url('/admin/') }}"
                            class="bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105">
                            @lang('Dashboard')
                        </a>
                    @else
                        <a href="{{ url('/admin/my-attendances') }}"
                            class="bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105">
                            @lang('Dashboard')
                        </a>
                    @endif
                @else
                    <a href="{{ url('/admin/login') }}"
                        class="bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 ml-4">
                        @lang('Log in')
                    </a>
                    <a href="{{ url('/admin/register') }}"
                        class="bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105">
                        @lang('Register')
                    </a>
                @endauth

                <!-- New Links -->
                <a href="{{ url('/contact') }}"
                    class="text-gray-700 font-medium hover:text-orange-600 transition duration-200 px-4">
                    @lang('Contact Us')
                </a>
                <a href="{{ url('/about') }}"
                    class="text-gray-700 font-medium hover:text-orange-600 transition duration-200 px-4">
                    @lang('About')
                </a>
            </div>
        </div>
    </nav> --}}

    <!-- Header -->

    <header class="relative overflow-hidden">
        <div class="mt-10 mx-20 mb-10 float-left grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
            <div class="bg-white rounded-2xl shadow-2xl">
                <div class=" bg-gray-100 rounded-lg ">

                    <img src="{{ asset('admin-assets/img/icons/unicons/logo1.png') }}" alt="Logo" width="250">

                </div>
            </div>
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-orange-100/5 to-orange-200/40"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-6">
                    <span class="bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                        اكتشف
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-orange-600 to-orange-500 bg-clip-text text-transparent">
                        {{ $settings->name }}
                    </span>
                </h1>
                <p class="text-xl text-gray-700 mb-8 max-w-3xl mx-auto">
                    انضم إلى مجتمع يضم آلاف المهتمين بالبيانات، واستكشف فعاليات
                    تجمع بين التعلم العملي، والتواصل المهني، وصناعة الأثر. اكتشف تجربتك القادمة
                </p>
                <div class="flex justify-center space-x-4 rtl:space-x-reverse">
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-calendar-check text-green-600 ml-2"></i>
                        <span>{{ $events->count() }} حدث نشط</span>
                    </div>
                    {{-- <div class="flex items-center text-gray-600">
                        <i class="fas fa-users text-blue-600 ml-2"></i>
                        <span>مجتمع متنامي</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </header>
    <!-- Events Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @if ($events->count() > 0)
            <!-- Events Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($events as $event)
                    <div
                        class="group relative bg-white backdrop-blur-lg rounded-2xl p-6 border border-gray-200 hover:border-orange-300 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-orange-500/25">
                        <!-- Event Status Badge -->
                        <div class="absolute top-4 left-4">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 border border-green-200">
                                <i class="fas fa-circle text-green-500 ml-1 text-xs"></i>
                                نشط
                            </span>
                        </div>

                        <!-- Event Image Placeholder -->
                        <div class="w-full h-48 bg-blue-950 rounded-xl mb-6 flex items-center justify-center">
                            @if ($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}"
                                    class="w-full h-full object-cover rounded-xl">
                            @else
                                {{-- <i class="fas fa-calendar-alt text-white text-4xl"></i> --}}
                                <img src="{{ asset('admin-assets/img/elements/1.png') }}">
                            @endif
                        </div>

                        <!-- Event Content -->
                        <div class="space-y-4">
                            <!-- Title -->
                            <h3
                                class="text-xl font-bold text-gray-900 group-hover:text-orange-600 transition-colors duration-300">
                                {{ $event->title }}
                            </h3>

                            <!-- Organizer -->
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-user-circle text-gray-500 ml-2"></i>
                                <span class="text-sm">منظم بواسطة {{ $event->admin->name }}</span>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-700 text-sm leading-relaxed line-clamp-3">
                                {{ Str::limit($event->description ?: 'انضم إلينا في حدث مذهل سيلهمك ويوصل вас مع أشخاص متشابهين في التفكير.', 120) }}
                            </p>

                            <!-- Date & Time -->
                            <div class="space-y-3">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-calendar text-green-600 ml-3 w-4"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $event->start_date->translatedFormat('l, F j, Y') }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            {{ $event->start_date->translatedFormat('g:i A') }}
                                        </p>
                                    </div>
                                    {{-- <p class="text-xs text-gray-500"> {{ $event->end_date->diffForHumans() }}</p> --}}
                                </div>



                                @if ($event->location)
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-map-marker-alt text-red-600 ml-3 w-4"></i>
                                        <p class="text-sm text-gray-700">{{ $event->location }}</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Attendees Count -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <div class="flex items-center text-gray-600">
                                    {{-- <i class="fas fa-users text-orange-500 ml-2"></i> --}}
                                    {{-- <span class="text-sm">{{ $event->total_attendees }} مشارك</span> --}}
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $event->start_date->diffForHumans() }}
                                </div>
                            </div>

                            <!-- Action Button -->
                            @php
                                $isFull = $event->attendances->count() >= $event->limits;
                            @endphp

                            <div class="pt-4">
                                @if ($event->is_active && !$isFull)
                                    <a href="{{ route('events.show', $event) }}"
                                        class="w-full bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-orange-500/25 flex items-center justify-center group">
                                        <span>عرض التفاصيل والتسجيل</span>
                                        <i
                                            class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-300"></i>
                                    </a>
                                @else
                                    <span>تم حجز جميع المقاعد</span>
                                    <i
                                        class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-300"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- No Events State -->
            <div class="text-center py-16">
                <div
                    class="bg-white backdrop-blur-lg rounded-2xl p-12 border border-gray-200 shadow-lg max-w-2xl mx-auto">
                    <i class="fas fa-calendar-times text-6xl text-gray-400 mb-6"></i>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">لا توجد أحداث نشطة</h2>
                    <p class="text-gray-700 mb-8">
                        نحن نعد حالياً بعض الأحداث المذهلة لك. تحقق مرة أخرى قريباً للحصول على فرص مثيرة!
                    </p>
                    <button
                        class="bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300">
                        <i class="fas fa-bell ml-2"></i>
                        إشعارني
                    </button>
                </div>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 backdrop-blur-lg border-t border-gray-200 mt-20">
        <div class="text-center mt-16">
            <div class="bg-white backdrop-blur-lg rounded-2xl p-8 border border-gray-200 shadow-lg max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">@lang('Contact Us')</h2>
                <p class="text-gray-700 mb-6">
                    @lang('We welcome your contact with us. Please fill out the form below, and we will respond to you as soon as possible.')
                </p>
                @livewire('front.components.contact-component')

            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <div class="text-center">

                <h3 class="text-2xl font-bold text-gray-900 mb-4"> منصات مجتمع البيانات</h3>
                <p class="text-gray-600 mb-6">تابعنا على</p>
                <div class="flex justify-center space-x-6 rtl:space-x-reverse">
                    @if ($settings->twitter)
                        <a href="{{ $settings->twitter }}" target="blank"
                            class="text-gray-500 hover:text-orange-600 transition-colors duration-300">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    @endif
                    @if ($settings->facebook)
                        <a href="{{ $settings->facebook }}" target="blank"
                            class="text-gray-500 hover:text-orange-600 transition-colors duration-300">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                    @endif
                    @if ($settings->instgram)
                        <a href="{{ $settings->instgram }}" target="blank"
                            class="text-gray-500 hover:text-orange-600 transition-colors duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    @endif
                    @if ($settings->linkedin)
                        <a href="{{ $settings->linkedin }}" target="blank"
                            class="text-gray-500 hover:text-orange-600 transition-colors duration-300">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    @endif
                    @if ($settings->youtube)
                        <a href="{{ $settings->youtube }}" target="blank"
                            class="text-gray-500 hover:text-orange-600 transition-colors duration-300">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    @endif
                    @if ($settings->telegram)
                        <a href="{{ $settings->telegram }}" target="blank"
                            class="text-gray-500 hover:text-orange-600 transition-colors duration-300">
                            <i class="fab fa-telegram text-xl"></i>
                        </a>
                    @endif
                </div>
                <p class="text-gray-500 text-sm mt-6"> © 2025 .جميع الحقوق محفوظة مجتمع البيانات العربي </p>
            </div>
        </div>
    </footer>

    <!-- Custom Styles -->
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .group:hover .group-hover\:translate-x-1 {
            transform: translateX(0.25rem);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .bg-gradient-to-br {
            background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
        }
    </style>

    <!-- Toast Script -->
    @if (session('success'))
        <script>
            function closeToast() {
                const toast = document.getElementById('successToast');
                if (toast) {
                    toast.classList.add('hiding');
                    setTimeout(() => {
                        toast.remove();
                    }, 500);
                }
            }

            // Auto-hide toast after 5 seconds
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(() => {
                    closeToast();
                }, 5000);
            });
        </script>
    @endif
</body>

</html>
