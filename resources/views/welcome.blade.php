<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reizen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($vacations as $vacation)
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ $vacation->country_name }}, {{ $vacation->city_name }}
                    </h2>
                    <p class="mt-1 text-gray-700">
                        from {{ $vacation->start_date}} to {{ $vacation->end_date }}
                    </p>
                    <span class="text-blue-800">{{ $vacation->description}}</span>
                    <p class="mt-1 text-sm text-gray-600">
                        Vacation provided by: {{ $vacation->provided_by}}
                    </p>
                    @if (is_null($vacation->booked_by))
                    <x-secondary-button>
                        {{ 'Book' }}
                    </x-secondary-button>
                    @else
                    hoi
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>


</x-app-layout>