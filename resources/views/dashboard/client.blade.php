<x-layout>

    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6">Client Dashboard</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

     
        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($announces as $announce)
            <div class="bg-white p-6 rounded-lg shadow-md  max-w-md mx-auto h-full flex flex-col justify-between transform transition duration-300 hover:scale-105">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2"> {{ $announce->title }} </h3>
                    <p class="text-gray-600"><span class="font-semibold">Available Seats:</span> {{ $announce->nb_place }} </p>
                    <p class="text-gray-600"><span class="font-semibold">Start Date:</span> {{ $announce->date_debut }} </p>
                    <p class="text-gray-600"><span class="font-semibold">End Date:</span> {{ $announce->date_fin }} </p>
                    <p class="text-gray-600"><span class="font-semibold">Start Time:</span> {{ $announce->heure_debut }} </p>
                    <p class="text-gray-600"><span class="font-semibold">End Time:</span> {{ $announce->heure_fin }} </p>
                </div>
                <a href="{{ route('announce.show', $announce->id) }}" 
                   class="mt-4 inline-block text-blue-500 font-semibold hover:underline">
                    View details
                </a>
            </div>
            @endforeach
        </div>
        
    </div>

</x-layout>
