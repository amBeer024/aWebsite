<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book travels') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="/">
                    {{-- @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif --}}

                    <input type="text" name="search" placeholder="Search for places"
                        class="bg-transparent placeholder-black font-semibold text-sm" value="{{ request('search') }}">
                </form>
                <a class="p-4" href="{{ URL::route('home') }}" class="btn btn-default">
                    <x-secondary-button> reset </x-secondary-button>
                </a>
            </div>
            @include('layouts.vacations')
        </div>
    </div>


</x-app-layout>