<x-layout>
    <div class="max-w-7xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Client Dashboard</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div id="flash"
                class="p-4 text-center bg-green-100 border border-green-400 text-green-700 font-semibold rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($announces as $announce)
                <div
                    class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between border border-gray-200 transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3"> {{ $announce->title }} </h3>
                        <p class="text-gray-700"><span class="font-semibold">Seats Available:</span>
                            {{ $announce->nb_place }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Start Date:</span> {{ $announce->date_debut }}
                        </p>
                        <p class="text-gray-700"><span class="font-semibold">Status:</span>
                            <span class="{{ $announce->status === 'Active' ? 'text-green-500' : 'text-red-500' }}">
                                {{ $announce->status }}
                            </span>
                        </p>
                        <p class="text-gray-700"><span class="font-semibold">End Date:</span> {{ $announce->date_fin }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Start Time:</span> {{ $announce->heure_debut }}
                        </p>
                        <p class="text-gray-700"><span class="font-semibold">End Time:</span> {{ $announce->heure_fin }}</p>
                    </div>
                    <a href="{{ route('announce.show', $announce->id) }}"
                        class="mt-4 inline-block text-blue-600 font-semibold hover:underline">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>