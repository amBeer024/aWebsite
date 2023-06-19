@foreach ($vacations as $vacation)
<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <div class="max-w-xl">
        <h2 class="text-lg font-medium text-gray-900">
            {{ $vacation->country_name }}, {{ $vacation->city_name }}
            <span class="text-red-900 float-right">{{ $vacation->price}} euro</span>
        </h2>
        <p class="mt-1 text-gray-700">
            from {{ $vacation->start_date}} to {{ $vacation->end_date }}
        </p>
        <span class="text-blue-800">{{ $vacation->description}}</span>
        <p class="mt-1 text-sm text-gray-600">
            Vacation provided by: {{ $vacation->provided_by}}
        </p>
        <x-secondary-button>
            @if (is_null($vacation->booked_by))
            @if(Auth::check())
            @if(Auth::user()->id==$vacation->provided_id)
            provided by you
            @else
            book
            @endif
            @else
            log in to book a vacation
            @endif
            @else
            you have bought this vacation
            @endif
        </x-secondary-button>
    </div>
</div>
@endforeach
{{ $vacations->links() }}