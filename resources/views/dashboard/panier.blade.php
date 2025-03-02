<x-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Your Reservations</h2>

        @if ($reservations->isEmpty())
            <p class="text-gray-500 text-center">No reservations found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200 shadow-sm rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                            <th class="py-3 px-4 border-b">Announcement</th>
                            <th class="py-3 px-4 border-b">Number of Seats</th>
                            <th class="py-3 px-4 border-b">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr class="border-b text-gray-700 hover:bg-gray-50 transition">
                                <td class="py-3 px-4">{{ $reservation->announce->title }}</td>
                                <td class="py-3 px-4 text-center">{{ $reservation->nb_places }}</td>
                                <td class="py-3 px-4">{{ $reservation->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layout>
