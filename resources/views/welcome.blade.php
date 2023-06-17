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
                    <span class="text-gray-800">{{ $vacation->city->city_name }}</span>
                    <span class="text-gray-800">{{ $vacation->city->country->country_name }}</span>
                    <span class="text-gray-800">{{ $vacation->description}}</span>
                </div>
            </div>



            @endforeach
        </div>
    </div>


</x-app-layout>