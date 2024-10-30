<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Service Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $service->name }}</h3>
                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $service->description }}</p>
                <p class="mt-2 text-gray-500 dark:text-gray-400">Price: {{ $service->price }} zł</p>
                <a href="{{ route('booking.create', ['service' => $service->id]) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition">
                    Book service
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
