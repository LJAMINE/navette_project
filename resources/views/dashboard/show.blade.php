<x-layout>

    



    <div class="bg-white p-6 rounded-lg shadow-md">
        @if (session('error'))
    <div id="flash" class="p-4 text-center bg-red-50 text-red-500 font-bold mb-6 rounded">
        {{ session('error') }}
    </div>
@endif
        <h3 class="text-xl font-semibold text-gray-800"> {{ $announce->title }} </h3>
        <p class="mt-2 text-gray-600"> {{ $announce->nb_place }} </p>
        <p class="mt-2 text-gray-600"> {{ $announce->date_debut }} </p>
        <p class="mt-2 text-gray-600"> {{ $announce->date_fin }} </p>
        <p class="mt-2 text-gray-600"> {{ $announce->heure_debut }} </p>
        <p class="mt-2 text-gray-600"> {{ $announce->heure_fin }} </p>
        {{-- <a href="/announces/{{$announce->id }}" class="mt-4 inline-block text-blue-500 hover:underline">View
            details</a> --}}

       

  

        <form action="{{ route('reservations.store') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="announce_id" value="{{ $announce->id }}">

            <label for="nb_places" class="font-semibold">Number of Seats:</label>
            <input type="number" id="nb_places" name="nb_places" required
                class="border p-2 rounded w-full mb-4">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Reserve Now
            </button>
        </form>

    </div>

</x-layout>