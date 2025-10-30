<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <div class="flex space-x-2">
                <a href="{{ route('language.swap', 'en') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">English</a>
                <a href="{{ route('language.swap', 'ar') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">العربية</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
