<x-layout_societe>

    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-bold mb-6 text-center">Statistics</h2>
    
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-3 px-6 text-left text-lg font-semibold text-gray-700">Announce Title</th>
                        <th class="py-3 px-6 text-left text-lg font-semibold text-gray-700">Total Reservations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announces as $announce)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-6 text-gray-700">{{ $announce->title }}</td>
                        <td class="py-3 px-6 text-gray-700">{{ $announce->reservations_count }}</td> <!-- Reservations count -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    </x-layout_societe>
    