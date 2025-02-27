<x-layout>


    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6">Societe Dashboard</h1>

        @if (session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif



        <a href="/form"
            class="mb-6 inline-block px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
            Create
        </a>


        <!-- Announce Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Title</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Content</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">nb_place</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Date Debut</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Date Fin</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Heure Debut</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Heure Fin</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach ($announces as $announce)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6">{{ $announce->title }}</td>
                            <td class="py-4 px-6">{{ $announce->content }}</td>
                            <td class="py-4 px-6">{{ $announce->nb_place }}</td>
                            <td class="py-4 px-6">{{ $announce->date_debut }}</td>
                            <td class="py-4 px-6">{{ $announce->date_fin }}</td>
                            <td class="py-4 px-6">{{ $announce->heure_debut }}</td>
                            <td class="py-4 px-6">{{ $announce->heure_fin }}</td>
                            <td class="py-4 px-6 flex items-center space-x-2">
                                <!-- Edit Button -->
                                <a href="{{  route('announce.edit', $announce->id) }}"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                                    Edit
                                </a>

                                <!-- Delete Form -->
                                <form action="{{ route('announce.destroy', $announce->id) }}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>


</x-layout>