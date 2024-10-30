<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Service: ') }} {{ $service->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session('status'))
                    <div class="text-green-600 mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('booking.store', $service->id) }}">
                    @csrf

                    <div class="mt-4">
                        <x-label for="booking_date" value="{{ __('Choose Booking Date') }}" />
                        <x-input id="booking_date" class="block mt-1 w-full" type="text" name="booking_date" required autocomplete="off" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Book Service') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#booking_date", {
                minDate: "today",
                dateFormat: "Y-m-d",
            });
        });
    </script>
</x-app-layout>
