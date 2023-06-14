<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reizen') }}
        </h2>
    </x-slot>
    {{ __() }}
    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        @foreach ($vacations as $vacation)
        <div class="p-6 flex space-x-2">
           
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        {{-- {{ dump($vacation) }} --}}
                        <span class="text-gray-800">{{ $vacation->city->city_name }}</span>
                        <span class="text-gray-800">{{ $vacation->city->country->country_name }}</span>
                        <span class="text-gray-800">{{ $vacation->description}}</span>
                        {{-- <small class="ml-2 text-sm text-gray-600">{{ $vacation->created_at->format('j M Y, g:i a')
                            }}</small> --}}
                    </div>
                </div>
                {{-- <p class="mt-4 text-lg text-gray-900">{{ $vacation->id }}</p> --}}
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>