<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - منصة الفعاليات</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
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
</head>

<body class="bg-gradient-to-br from-orange-50 to-orange-100 min-h-screen">
    <!-- Success Toast Popup -->
    {{-- @if (session('success'))
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
    @endif --}}

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
                            @if (session('name') || session('email'))
                                <div class="space-y-3">
                                    @if (session('name'))
                                        <div class="flex justify-between items-center">
                                            <span class="text-orange-200">الاسم:</span>
                                            <span class="text-white font-medium">{{ session('name') }}</span>
                                        </div>
                                    @endif
                                    @if (session('email'))
                                        <div class="flex justify-between items-center">
                                            <span class="text-orange-200">البريد الإلكتروني:</span>
                                            <span class="text-white font-medium">{{ session('email') }}</span>
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
                            @php
                                $prefillEventId = old('event_id', session('event_id'));
                                $prefillCountry = old('country', session('country'));
                            @endphp
                            <input type="hidden" name="attendance" value="{{ $prefillEventId ? 1 : 0 }}">
                            <input type="hidden" name="event_id" value="{{ $prefillEventId }}">
                            <input type="hidden" name="country" value="{{ $prefillCountry }}">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم
                                    الكامل</label>
                                <input type="text" id="name" name="name"
                                    value="{{ session('name', old('name')) }}" autofocus
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    placeholder="أدخل اسمك الكامل" required>
                                @error('name')
                                    <p class="text-orange-600 hover:text-orange-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد
                                    الإلكتروني</label>
                                <input type="email" id="email" name="email"
                                    value="{{ session('email', old('email')) }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    placeholder="أدخل بريدك الإلكتروني" required />
                                <div class="text-orange-600 hover:text-orange-700 font-medium">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="nationality"
                                    class="block text-sm font-medium text-gray-700 mb-2">@lang('Nationality')</label>
                                <select id="nationality" name="nationality"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    required>
                                    <option value="">@lang('Nationality or home country')</option>

                                    <!-- --- ARAB NATIONALITIES FIRST (sorted by Arabic name, 'ال' ignored for ordering) --- -->
                                    <option value="Saudi Arabia"
                                        {{ old('nationality', session('nationality')) == 'Saudi Arabia' ? 'selected' : '' }}>
                                        @lang('Saudi Arabia')</option>
                                    <option value="Jordan"
                                        {{ old('nationality', session('nationality')) == 'Jordan' ? 'selected' : '' }}>
                                        @lang('Jordan')</option>
                                    <option value="Egypt"
                                        {{ old('nationality', session('nationality')) == 'Egypt' ? 'selected' : '' }}>
                                        @lang('Egypt')</option>
                                    <option value="Qatar"
                                        {{ old('nationality', session('nationality')) == 'Qatar' ? 'selected' : '' }}>
                                        @lang('Qatar')</option>
                                    <option value="Sudan"
                                        {{ old('nationality', session('nationality')) == 'Sudan' ? 'selected' : '' }}>
                                        @lang('Sudan')</option>
                                    <option value="Kuwait"
                                        {{ old('nationality', session('nationality')) == 'Kuwait' ? 'selected' : '' }}>
                                        @lang('Kuwait')</option>
                                    <option value="Bahrain"
                                        {{ old('nationality', session('nationality')) == 'Bahrain' ? 'selected' : '' }}>
                                        @lang('Bahrain')</option>
                                    <option value="Tunisia"
                                        {{ old('nationality', session('nationality')) == 'Tunisia' ? 'selected' : '' }}>
                                        @lang('Tunisia')</option>
                                    <option value="Algeria"
                                        {{ old('nationality', session('nationality')) == 'Algeria' ? 'selected' : '' }}>
                                        @lang('Algeria')</option>


                                    <option value="Syria"
                                        {{ old('nationality', session('nationality')) == 'Syria' ? 'selected' : '' }}>
                                        @lang('Syria')</option>
                                    <option value="Somalia"
                                        {{ old('nationality', session('nationality')) == 'Somalia' ? 'selected' : '' }}>
                                        @lang('Somalia')</option>
                                    <option value="Iraq"
                                        {{ old('nationality', session('nationality')) == 'Iraq' ? 'selected' : '' }}>
                                        @lang('Iraq')</option>
                                    <option value="Oman"
                                        {{ old('nationality', session('nationality')) == 'Oman' ? 'selected' : '' }}>
                                        @lang('Oman')</option>
                                    <option value="Palestine"
                                        {{ old('nationality', session('nationality')) == 'Palestine' ? 'selected' : '' }}>
                                        @lang('Palestine')</option>

                                    <option value="Lebanon"
                                        {{ old('nationality', session('nationality')) == 'Lebanon' ? 'selected' : '' }}>
                                        @lang('Lebanon')</option>
                                    <option value="Libya"
                                        {{ old('nationality', session('nationality')) == 'Libya' ? 'selected' : '' }}>
                                        @lang('Libya')</option>

                                    <option value="Morocco"
                                        {{ old('nationality', session('nationality')) == 'Morocco' ? 'selected' : '' }}>
                                        @lang('Morocco')</option>
                                    <option value="Mauritania"
                                        {{ old('nationality', session('nationality')) == 'Mauritania' ? 'selected' : '' }}>
                                        @lang('Mauritania')</option>
                                    <option value="Yemen"
                                        {{ old('nationality', session('nationality')) == 'Yemen' ? 'selected' : '' }}>
                                        @lang('Yemen')</option>
                                    <option value="Comoros"
                                        {{ old('nationality', session('nationality')) == 'Comoros' ? 'selected' : '' }}>
                                        @lang('Comoros')</option>
                                    <option value="Djibouti"
                                        {{ old('nationality', session('nationality')) == 'Djibouti' ? 'selected' : '' }}>
                                        @lang('Djibouti')</option>
                                    <option value="United Arab Emirates"
                                        {{ old('nationality', session('nationality')) == 'United Arab Emirates' ? 'selected' : '' }}>
                                        @lang('United Arab Emirates')</option>
                                    <!-- --- REST OF THE COUNTRIES (also sorted by Arabic name) --- -->
                                    <option value="Iceland"
                                        {{ old('nationality', session('nationality')) == 'Iceland' ? 'selected' : '' }}>
                                        @lang('Iceland')</option>
                                    <option value="Azerbaijan"
                                        {{ old('nationality', session('nationality')) == 'Azerbaijan' ? 'selected' : '' }}>
                                        @lang('Azerbaijan')</option>
                                    <option value="Argentina"
                                        {{ old('nationality', session('nationality')) == 'Argentina' ? 'selected' : '' }}>
                                        @lang('Argentina')</option>
                                    <option value="Armenia"
                                        {{ old('nationality', session('nationality')) == 'Armenia' ? 'selected' : '' }}>
                                        @lang('Armenia')</option>
                                    <option value="Australia"
                                        {{ old('nationality', session('nationality')) == 'Australia' ? 'selected' : '' }}>
                                        @lang('Australia')</option>
                                    <option value="Afghanistan"
                                        {{ old('nationality', session('nationality')) == 'Afghanistan' ? 'selected' : '' }}>
                                        @lang('Afghanistan')</option>
                                    <option value="Albania"
                                        {{ old('nationality', session('nationality')) == 'Albania' ? 'selected' : '' }}>
                                        @lang('Albania')</option>
                                    <option value="Germany"
                                        {{ old('nationality', session('nationality')) == 'Germany' ? 'selected' : '' }}>
                                        @lang('Germany')</option>
                                    <option value="Antigua and Barbuda"
                                        {{ old('nationality', session('nationality')) == 'Antigua and Barbuda' ? 'selected' : '' }}>
                                        @lang('Antigua and Barbuda')</option>
                                    <option value="Andorra"
                                        {{ old('nationality', session('nationality')) == 'Andorra' ? 'selected' : '' }}>
                                        @lang('Andorra')</option>
                                    <option value="Angola"
                                        {{ old('nationality', session('nationality')) == 'Angola' ? 'selected' : '' }}>
                                        @lang('Angola')</option>
                                    <option value="Bahamas"
                                        {{ old('nationality', session('nationality')) == 'Bahamas' ? 'selected' : '' }}>
                                        @lang('Bahamas')</option>
                                    <option value="Bangladesh"
                                        {{ old('nationality', session('nationality')) == 'Bangladesh' ? 'selected' : '' }}>
                                        @lang('Bangladesh')</option>
                                    <option value="Barbados"
                                        {{ old('nationality', session('nationality')) == 'Barbados' ? 'selected' : '' }}>
                                        @lang('Barbados')</option>
                                    <option value="Belarus"
                                        {{ old('nationality', session('nationality')) == 'Belarus' ? 'selected' : '' }}>
                                        @lang('Belarus')</option>
                                    <option value="Belgium"
                                        {{ old('nationality', session('nationality')) == 'Belgium' ? 'selected' : '' }}>
                                        @lang('Belgium')</option>
                                    <option value="Belize"
                                        {{ old('nationality', session('nationality')) == 'Belize' ? 'selected' : '' }}>
                                        @lang('Belize')</option>
                                    <option value="Benin"
                                        {{ old('nationality', session('nationality')) == 'Benin' ? 'selected' : '' }}>
                                        @lang('Benin')</option>
                                    <option value="Bhutan"
                                        {{ old('nationality', session('nationality')) == 'Bhutan' ? 'selected' : '' }}>
                                        @lang('Bhutan')</option>
                                    <option value="Bolivia"
                                        {{ old('nationality', session('nationality')) == 'Bolivia' ? 'selected' : '' }}>
                                        @lang('Bolivia')</option>
                                    <option value="Bosnia and Herzegovina"
                                        {{ old('nationality', session('nationality')) == 'Bosnia and Herzegovina' ? 'selected' : '' }}>
                                        @lang('Bosnia and Herzegovina')</option>
                                    <option value="Botswana"
                                        {{ old('nationality', session('nationality')) == 'Botswana' ? 'selected' : '' }}>
                                        @lang('Botswana')</option>
                                    <option value="Brazil"
                                        {{ old('nationality', session('nationality')) == 'Brazil' ? 'selected' : '' }}>
                                        @lang('Brazil')</option>
                                    <option value="Brunei"
                                        {{ old('nationality', session('nationality')) == 'Brunei' ? 'selected' : '' }}>
                                        @lang('Brunei')</option>
                                    <option value="Bulgaria"
                                        {{ old('nationality', session('nationality')) == 'Bulgaria' ? 'selected' : '' }}>
                                        @lang('Bulgaria')</option>
                                    <option value="Burkina Faso"
                                        {{ old('nationality', session('nationality')) == 'Burkina Faso' ? 'selected' : '' }}>
                                        @lang('Burkina Faso')</option>
                                    <option value="Burundi"
                                        {{ old('nationality', session('nationality')) == 'Burundi' ? 'selected' : '' }}>
                                        @lang('Burundi')</option>
                                    <option value="Cabo Verde"
                                        {{ old('nationality', session('nationality')) == 'Cabo Verde' ? 'selected' : '' }}>
                                        @lang('Cabo Verde')</option>
                                    <option value="Cambodia"
                                        {{ old('nationality', session('nationality')) == 'Cambodia' ? 'selected' : '' }}>
                                        @lang('Cambodia')</option>
                                    <option value="Cameroon"
                                        {{ old('nationality', session('nationality')) == 'Cameroon' ? 'selected' : '' }}>
                                        @lang('Cameroon')</option>
                                    <option value="Canada"
                                        {{ old('nationality', session('nationality')) == 'Canada' ? 'selected' : '' }}>
                                        @lang('Canada')</option>
                                    <option value="Central African Republic"
                                        {{ old('nationality', session('nationality')) == 'Central African Republic' ? 'selected' : '' }}>
                                        @lang('Central African Republic')</option>
                                    <option value="Chad"
                                        {{ old('nationality', session('nationality')) == 'Chad' ? 'selected' : '' }}>
                                        @lang('Chad')</option>
                                    <option value="Chile"
                                        {{ old('nationality', session('nationality')) == 'Chile' ? 'selected' : '' }}>
                                        @lang('Chile')</option>
                                    <option value="China"
                                        {{ old('nationality', session('nationality')) == 'China' ? 'selected' : '' }}>
                                        @lang('China')</option>
                                    <option value="Colombia"
                                        {{ old('nationality', session('nationality')) == 'Colombia' ? 'selected' : '' }}>
                                        @lang('Colombia')</option>
                                    <option value="Congo"
                                        {{ old('nationality', session('nationality')) == 'Congo' ? 'selected' : '' }}>
                                        @lang('Congo')</option>
                                    <option value="Costa Rica"
                                        {{ old('nationality', session('nationality')) == 'Costa Rica' ? 'selected' : '' }}>
                                        @lang('Costa Rica')</option>
                                    <option value="Croatia"
                                        {{ old('nationality', session('nationality')) == 'Croatia' ? 'selected' : '' }}>
                                        @lang('Croatia')</option>
                                    <option value="Cuba"
                                        {{ old('nationality', session('nationality')) == 'Cuba' ? 'selected' : '' }}>
                                        @lang('Cuba')</option>
                                    <option value="Cyprus"
                                        {{ old('nationality', session('nationality')) == 'Cyprus' ? 'selected' : '' }}>
                                        @lang('Cyprus')</option>
                                    <option value="Czech Republic"
                                        {{ old('nationality', session('nationality')) == 'Czech Republic' ? 'selected' : '' }}>
                                        @lang('Czech Republic')</option>
                                    <option value="Denmark"
                                        {{ old('nationality', session('nationality')) == 'Denmark' ? 'selected' : '' }}>
                                        @lang('Denmark')</option>
                                    <option value="Dominica"
                                        {{ old('nationality', session('nationality')) == 'Dominica' ? 'selected' : '' }}>
                                        @lang('Dominica')</option>
                                    <option value="Dominican Republic"
                                        {{ old('nationality', session('nationality')) == 'Dominican Republic' ? 'selected' : '' }}>
                                        @lang('Dominican Republic')</option>
                                    <option value="Ecuador"
                                        {{ old('nationality', session('nationality')) == 'Ecuador' ? 'selected' : '' }}>
                                        @lang('Ecuador')</option>
                                    <option value="El Salvador"
                                        {{ old('nationality', session('nationality')) == 'El Salvador' ? 'selected' : '' }}>
                                        @lang('El Salvador')</option>
                                    <option value="Equatorial Guinea"
                                        {{ old('nationality', session('nationality')) == 'Equatorial Guinea' ? 'selected' : '' }}>
                                        @lang('Equatorial Guinea')</option>
                                    <option value="Eritrea"
                                        {{ old('nationality', session('nationality')) == 'Eritrea' ? 'selected' : '' }}>
                                        @lang('Eritrea')</option>
                                    <option value="Estonia"
                                        {{ old('nationality', session('nationality')) == 'Estonia' ? 'selected' : '' }}>
                                        @lang('Estonia')</option>
                                    <option value="Eswatini"
                                        {{ old('nationality', session('nationality')) == 'Eswatini' ? 'selected' : '' }}>
                                        @lang('Eswatini')</option>
                                    <option value="Ethiopia"
                                        {{ old('nationality', session('nationality')) == 'Ethiopia' ? 'selected' : '' }}>
                                        @lang('Ethiopia')</option>
                                    <option value="Fiji"
                                        {{ old('nationality', session('nationality')) == 'Fiji' ? 'selected' : '' }}>
                                        @lang('Fiji')</option>
                                    <option value="Finland"
                                        {{ old('nationality', session('nationality')) == 'Finland' ? 'selected' : '' }}>
                                        @lang('Finland')</option>
                                    <option value="France"
                                        {{ old('nationality', session('nationality')) == 'France' ? 'selected' : '' }}>
                                        @lang('France')</option>
                                    <option value="Gabon"
                                        {{ old('nationality', session('nationality')) == 'Gabon' ? 'selected' : '' }}>
                                        @lang('Gabon')</option>
                                    <option value="Gambia"
                                        {{ old('nationality', session('nationality')) == 'Gambia' ? 'selected' : '' }}>
                                        @lang('Gambia')</option>
                                    <option value="Georgia"
                                        {{ old('nationality', session('nationality')) == 'Georgia' ? 'selected' : '' }}>
                                        @lang('Georgia')</option>
                                    <option value="Ghana"
                                        {{ old('nationality', session('nationality')) == 'Ghana' ? 'selected' : '' }}>
                                        @lang('Ghana')</option>
                                    <option value="Greece"
                                        {{ old('nationality', session('nationality')) == 'Greece' ? 'selected' : '' }}>
                                        @lang('Greece')</option>
                                    <option value="Grenada"
                                        {{ old('nationality', session('nationality')) == 'Grenada' ? 'selected' : '' }}>
                                        @lang('Grenada')</option>
                                    <option value="Guatemala"
                                        {{ old('nationality', session('nationality')) == 'Guatemala' ? 'selected' : '' }}>
                                        @lang('Guatemala')</option>
                                    <option value="Guinea"
                                        {{ old('nationality', session('nationality')) == 'Guinea' ? 'selected' : '' }}>
                                        @lang('Guinea')</option>
                                    <option value="Guinea-Bissau"
                                        {{ old('nationality', session('nationality')) == 'Guinea-Bissau' ? 'selected' : '' }}>
                                        @lang('Guinea-Bissau')</option>
                                    <option value="Guyana"
                                        {{ old('nationality', session('nationality')) == 'Guyana' ? 'selected' : '' }}>
                                        @lang('Guyana')</option>
                                    <option value="Haiti"
                                        {{ old('nationality', session('nationality')) == 'Haiti' ? 'selected' : '' }}>
                                        @lang('Haiti')</option>
                                    <option value="Honduras"
                                        {{ old('nationality', session('nationality')) == 'Honduras' ? 'selected' : '' }}>
                                        @lang('Honduras')</option>
                                    <option value="Hungary"
                                        {{ old('nationality', session('nationality')) == 'Hungary' ? 'selected' : '' }}>
                                        @lang('Hungary')</option>
                                    <option value="India"
                                        {{ old('nationality', session('nationality')) == 'India' ? 'selected' : '' }}>
                                        @lang('India')</option>
                                    <option value="Indonesia"
                                        {{ old('nationality', session('nationality')) == 'Indonesia' ? 'selected' : '' }}>
                                        @lang('Indonesia')</option>
                                    <option value="Iran"
                                        {{ old('nationality', session('nationality')) == 'Iran' ? 'selected' : '' }}>
                                        @lang('Iran')</option>
                                    <option value="Ireland"
                                        {{ old('nationality', session('nationality')) == 'Ireland' ? 'selected' : '' }}>
                                        @lang('Ireland')</option>
                                    <option value="Italy"
                                        {{ old('nationality', session('nationality')) == 'Italy' ? 'selected' : '' }}>
                                        @lang('Italy')</option>
                                    <option value="Jamaica"
                                        {{ old('nationality', session('nationality')) == 'Jamaica' ? 'selected' : '' }}>
                                        @lang('Jamaica')</option>
                                    <option value="Japan"
                                        {{ old('nationality', session('nationality')) == 'Japan' ? 'selected' : '' }}>
                                        @lang('Japan')</option>
                                    <option value="Kazakhstan"
                                        {{ old('nationality', session('nationality')) == 'Kazakhstan' ? 'selected' : '' }}>
                                        @lang('Kazakhstan')</option>
                                    <option value="Kenya"
                                        {{ old('nationality', session('nationality')) == 'Kenya' ? 'selected' : '' }}>
                                        @lang('Kenya')</option>
                                    <option value="Kiribati"
                                        {{ old('nationality', session('nationality')) == 'Kiribati' ? 'selected' : '' }}>
                                        @lang('Kiribati')</option>
                                    <option value="Kosovo"
                                        {{ old('nationality', session('nationality')) == 'Kosovo' ? 'selected' : '' }}>
                                        @lang('Kosovo')</option>
                                    <option value="Kyrgyzstan"
                                        {{ old('nationality', session('nationality')) == 'Kyrgyzstan' ? 'selected' : '' }}>
                                        @lang('Kyrgyzstan')</option>
                                    <option value="Laos"
                                        {{ old('nationality', session('nationality')) == 'Laos' ? 'selected' : '' }}>
                                        @lang('Laos')</option>
                                    <option value="Latvia"
                                        {{ old('nationality', session('nationality')) == 'Latvia' ? 'selected' : '' }}>
                                        @lang('Latvia')</option>
                                    <option value="Lesotho"
                                        {{ old('nationality', session('nationality')) == 'Lesotho' ? 'selected' : '' }}>
                                        @lang('Lesotho')</option>
                                    <option value="Liberia"
                                        {{ old('nationality', session('nationality')) == 'Liberia' ? 'selected' : '' }}>
                                        @lang('Liberia')</option>
                                    <option value="Liechtenstein"
                                        {{ old('nationality', session('nationality')) == 'Liechtenstein' ? 'selected' : '' }}>
                                        @lang('Liechtenstein')</option>
                                    <option value="Lithuania"
                                        {{ old('nationality', session('nationality')) == 'Lithuania' ? 'selected' : '' }}>
                                        @lang('Lithuania')</option>
                                    <option value="Luxembourg"
                                        {{ old('nationality', session('nationality')) == 'Luxembourg' ? 'selected' : '' }}>
                                        @lang('Luxembourg')</option>
                                    <option value="Madagascar"
                                        {{ old('nationality', session('nationality')) == 'Madagascar' ? 'selected' : '' }}>
                                        @lang('Madagascar')</option>
                                    <option value="Malawi"
                                        {{ old('nationality', session('nationality')) == 'Malawi' ? 'selected' : '' }}>
                                        @lang('Malawi')</option>
                                    <option value="Malaysia"
                                        {{ old('nationality', session('nationality')) == 'Malaysia' ? 'selected' : '' }}>
                                        @lang('Malaysia')</option>
                                    <option value="Mali"
                                        {{ old('nationality', session('nationality')) == 'Mali' ? 'selected' : '' }}>
                                        @lang('Mali')</option>
                                    <option value="Malta"
                                        {{ old('nationality', session('nationality')) == 'Malta' ? 'selected' : '' }}>
                                        @lang('Malta')</option>
                                    <option value="Marshall Islands"
                                        {{ old('nationality', session('nationality')) == 'Marshall Islands' ? 'selected' : '' }}>
                                        @lang('Marshall Islands')</option>
                                    <option value="Mauritius"
                                        {{ old('nationality', session('nationality')) == 'Mauritius' ? 'selected' : '' }}>
                                        @lang('Mauritius')</option>
                                    <option value="Mexico"
                                        {{ old('nationality', session('nationality')) == 'Mexico' ? 'selected' : '' }}>
                                        @lang('Mexico')</option>
                                    <option value="Micronesia"
                                        {{ old('nationality', session('nationality')) == 'Micronesia' ? 'selected' : '' }}>
                                        @lang('Micronesia')</option>
                                    <option value="Moldova"
                                        {{ old('nationality', session('nationality')) == 'Moldova' ? 'selected' : '' }}>
                                        @lang('Moldova')</option>
                                    <option value="Monaco"
                                        {{ old('nationality', session('nationality')) == 'Monaco' ? 'selected' : '' }}>
                                        @lang('Monaco')</option>
                                    <option value="Mongolia"
                                        {{ old('nationality', session('nationality')) == 'Mongolia' ? 'selected' : '' }}>
                                        @lang('Mongolia')</option>
                                    <option value="Montenegro"
                                        {{ old('nationality', session('nationality')) == 'Montenegro' ? 'selected' : '' }}>
                                        @lang('Montenegro')</option>
                                    <option value="Mozambique"
                                        {{ old('nationality', session('nationality')) == 'Mozambique' ? 'selected' : '' }}>
                                        @lang('Mozambique')</option>
                                    <option value="Myanmar"
                                        {{ old('nationality', session('nationality')) == 'Myanmar' ? 'selected' : '' }}>
                                        @lang('Myanmar')</option>
                                    <option value="Namibia"
                                        {{ old('nationality', session('nationality')) == 'Namibia' ? 'selected' : '' }}>
                                        @lang('Namibia')</option>
                                    <option value="Nauru"
                                        {{ old('nationality', session('nationality')) == 'Nauru' ? 'selected' : '' }}>
                                        @lang('Nauru')</option>
                                    <option value="Nepal"
                                        {{ old('nationality', session('nationality')) == 'Nepal' ? 'selected' : '' }}>
                                        @lang('Nepal')</option>
                                    <option value="Netherlands"
                                        {{ old('nationality', session('nationality')) == 'Netherlands' ? 'selected' : '' }}>
                                        @lang('Netherlands')</option>
                                    <option value="New Zealand"
                                        {{ old('nationality', session('nationality')) == 'New Zealand' ? 'selected' : '' }}>
                                        @lang('New Zealand')</option>
                                    <option value="Nicaragua"
                                        {{ old('nationality', session('nationality')) == 'Nicaragua' ? 'selected' : '' }}>
                                        @lang('Nicaragua')</option>
                                    <option value="Niger"
                                        {{ old('nationality', session('nationality')) == 'Niger' ? 'selected' : '' }}>
                                        @lang('Niger')</option>
                                    <option value="Nigeria"
                                        {{ old('nationality', session('nationality')) == 'Nigeria' ? 'selected' : '' }}>
                                        @lang('Nigeria')</option>
                                    <option value="North Korea"
                                        {{ old('nationality', session('nationality')) == 'North Korea' ? 'selected' : '' }}>
                                        @lang('North Korea')</option>
                                    <option value="Norway"
                                        {{ old('nationality', session('nationality')) == 'Norway' ? 'selected' : '' }}>
                                        @lang('Norway')</option>
                                    <option value="Pakistan"
                                        {{ old('nationality', session('nationality')) == 'Pakistan' ? 'selected' : '' }}>
                                        @lang('Pakistan')</option>
                                    <option value="Palau"
                                        {{ old('nationality', session('nationality')) == 'Palau' ? 'selected' : '' }}>
                                        @lang('Palau')</option>
                                    <option value="Panama"
                                        {{ old('nationality', session('nationality')) == 'Panama' ? 'selected' : '' }}>
                                        @lang('Panama')</option>
                                    <option value="Papua New Guinea"
                                        {{ old('nationality', session('nationality')) == 'Papua New Guinea' ? 'selected' : '' }}>
                                        @lang('Papua New Guinea')</option>
                                    <option value="Paraguay"
                                        {{ old('nationality', session('nationality')) == 'Paraguay' ? 'selected' : '' }}>
                                        @lang('Paraguay')</option>
                                    <option value="Peru"
                                        {{ old('nationality', session('nationality')) == 'Peru' ? 'selected' : '' }}>
                                        @lang('Peru')</option>
                                    <option value="Poland"
                                        {{ old('nationality', session('nationality')) == 'Poland' ? 'selected' : '' }}>
                                        @lang('Poland')</option>
                                    <option value="Portugal"
                                        {{ old('nationality', session('nationality')) == 'Portugal' ? 'selected' : '' }}>
                                        @lang('Portugal')</option>
                                    <option value="Romania"
                                        {{ old('nationality', session('nationality')) == 'Romania' ? 'selected' : '' }}>
                                        @lang('Romania')</option>
                                    <option value="Russia"
                                        {{ old('nationality', session('nationality')) == 'Russia' ? 'selected' : '' }}>
                                        @lang('Russia')</option>
                                    <option value="Rwanda"
                                        {{ old('nationality', session('nationality')) == 'Rwanda' ? 'selected' : '' }}>
                                        @lang('Rwanda')</option>
                                    <option value="Saint Kitts and Nevis"
                                        {{ old('nationality', session('nationality')) == 'Saint Kitts and Nevis' ? 'selected' : '' }}>
                                        @lang('Saint Kitts and Nevis')</option>
                                    <option value="Saint Lucia"
                                        {{ old('nationality', session('nationality')) == 'Saint Lucia' ? 'selected' : '' }}>
                                        @lang('Saint Lucia')</option>
                                    <option value="Saint Vincent and the Grenadines"
                                        {{ old('nationality', session('nationality')) == 'Saint Vincent and the Grenadines' ? 'selected' : '' }}>
                                        @lang('Saint Vincent and the Grenadines')</option>
                                    <option value="Samoa"
                                        {{ old('nationality', session('nationality')) == 'Samoa' ? 'selected' : '' }}>
                                        @lang('Samoa')</option>
                                    <option value="San Marino"
                                        {{ old('nationality', session('nationality')) == 'San Marino' ? 'selected' : '' }}>
                                        @lang('San Marino')</option>
                                    <option value="Senegal"
                                        {{ old('nationality', session('nationality')) == 'Senegal' ? 'selected' : '' }}>
                                        @lang('Senegal')</option>
                                    <option value="Serbia"
                                        {{ old('nationality', session('nationality')) == 'Serbia' ? 'selected' : '' }}>
                                        @lang('Serbia')</option>
                                    <option value="Seychelles"
                                        {{ old('nationality', session('nationality')) == 'Seychelles' ? 'selected' : '' }}>
                                        @lang('Seychelles')</option>
                                    <option value="Sierra Leone"
                                        {{ old('nationality', session('nationality')) == 'Sierra Leone' ? 'selected' : '' }}>
                                        @lang('Sierra Leone')</option>
                                    <option value="Singapore"
                                        {{ old('nationality', session('nationality')) == 'Singapore' ? 'selected' : '' }}>
                                        @lang('Singapore')</option>
                                    <option value="Slovakia"
                                        {{ old('nationality', session('nationality')) == 'Slovakia' ? 'selected' : '' }}>
                                        @lang('Slovakia')</option>
                                    <option value="Slovenia"
                                        {{ old('nationality', session('nationality')) == 'Slovenia' ? 'selected' : '' }}>
                                        @lang('Slovenia')</option>
                                    <option value="Solomon Islands"
                                        {{ old('nationality', session('nationality')) == 'Solomon Islands' ? 'selected' : '' }}>
                                        @lang('Solomon Islands')</option>
                                    <option value="South Africa"
                                        {{ old('nationality', session('nationality')) == 'South Africa' ? 'selected' : '' }}>
                                        @lang('South Africa')</option>
                                    <option value="South Korea"
                                        {{ old('nationality', session('nationality')) == 'South Korea' ? 'selected' : '' }}>
                                        @lang('South Korea')</option>
                                    <option value="South Sudan"
                                        {{ old('nationality', session('nationality')) == 'South Sudan' ? 'selected' : '' }}>
                                        @lang('South Sudan')</option>
                                    <option value="Sri Lanka"
                                        {{ old('nationality', session('nationality')) == 'Sri Lanka' ? 'selected' : '' }}>
                                        @lang('Sri Lanka')</option>

                                </select>

                                <div class="text-orange-600 hover:text-orange-700 font-medium">
                                    @error('nationality')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div>
                            </div>
                            <div class=<label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                @lang('Phone Number') </label>

                                <div class="input-group input-group-merge">
                                    <input type="tel" maxlength="15" pattern="\+\00\d{7,14}" inputmode="tel"
                                        id="phone" name="phone" value="{{ old('phone') }}"
                                        class="form-control form-control w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                        placeholder="@lang('Please enter your phone number with country code')" required />
                                </div>

                                @error('phone')
                                    <p class="text-orange-600 hover:text-orange-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Job Title Field -->
                            <div>
                                <label for="job_title" class="block text-sm font-medium text-gray-700 mb-2">المسمى
                                    الوظيفي</label>
                                <input type="text" id="job_title" name="job_title"
                                    value="{{ session('job_title', old('job_title')) }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    placeholder="@lang('Job title or field of study')" required>
                                @error('job_title')
                                    <p class="text-orange-600 hover:text-orange-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Gender Field -->
                            <div>
                                <label for="gender"
                                    class="block text-sm font-medium text-gray-700 mb-2">الجنس</label>
                                <select id="gender" name="gender"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                                    required>
                                    <option value="">اختر الجنس</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ذكر
                                    </option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>أنثى
                                    </option>
                                </select>
                                @error('gender')
                                    <p class="text-orange-600 hover:text-orange-700 font-medium">{{ $message }}</p>
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
                                    <p class="text-orange-600 hover:text-orange-700 font-medium">{{ $message }}</p>
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
                                    <p class="text-orange-600 hover:text-orange-700 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-6 rounded-xl transition-colors duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-user-plus ml-2"></i>
                                إنشاء الحساب
                            </button>


                        </form>


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
                <p class="text-gray-600">© 2024 منصة الفعاليات . جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

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
