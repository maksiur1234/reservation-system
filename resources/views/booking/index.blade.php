<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mb-6 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Bookings Received</h3>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($receivedBookings as $booking)
                        <li class="py-4 px-6 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $booking->booking_date }}</h4>
                            <p class="text-gray-600 dark:text-gray-400">Service: {{ $booking->service_name }}</p>
                        </li>
                    @endforeach
                </ul>
                @if($receivedBookings->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400 p-4">No bookings received.</p>
                @endif
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">My Bookings Made</h3>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($madeBookings as $booking)
                        <li class="py-4 px-6 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $booking->booking_date }}</h4>
                            <p class="text-gray-600 dark:text-gray-400">Service: {{ $booking->service_name }}</p>
                        </li>
                    @endforeach
                </ul>
                @if($madeBookings->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400 p-4">No bookings made.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
