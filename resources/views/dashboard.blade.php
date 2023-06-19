<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <a class="p-4" href="{{ URL::route('dashboard') }}" class="btn btn-default">
                <x-secondary-button> sell a vacation </x-secondary-button>
            </a>
            <a class="p-4" href="{{ URL::route('booked') }}" class="btn btn-default">
                <x-secondary-button> my booked vacations </x-secondary-button>
            </a>
            <a class="p-4" href="{{ URL::route('provided') }}" class="btn btn-default">
                <x-secondary-button> my provided vacations </x-secondary-button>
            </a>
        </div>

    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if(Route::is('dashboard'))
        @include('layouts.provideVacation')
        @else
        @include('layouts.vacations')
        @endif
    </div>
</x-app-layout>