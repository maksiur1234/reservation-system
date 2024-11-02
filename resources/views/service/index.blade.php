<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                @can('create', App\Models\Service\Service::class) 
                <a href="{{ route('service.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition">
                    Add new service
                </a>
                @endcan
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">List of Services</h3>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($services as $service)
                        <li class="py-4 px-6 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <a href="{{ route('service.details', $service->id) }}" class="block">
                                <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $service->name }}</h4>
                                <p class="text-gray-600 dark:text-gray-400 mt-1">{{ $service->description }}</p>
                                <p class="text-gray-500 dark:text-gray-400">Price: {{ $service->price }} zł</p>
                                <a href="{{ route('service.edit', $service->id) }}" class="block">
                            </a>
                            <div>
                                <a href="{{ route('service.edit', $service->id) }}" class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white text-sm font-semibold rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                                    Edit
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if($services->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400 p-4">No services available.</p>
                @endif

                <div class="mt-4">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
