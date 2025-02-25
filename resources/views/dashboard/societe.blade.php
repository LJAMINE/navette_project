<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>

    <h1>societe Dashboard</h1>

    @if (session('success'))
        <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-6">
            {{ session('success') }}
        </div>
    @endif
    @auth
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth


    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Title</th>
                <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Content</th>
                <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">nb_place At</th>
                <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">date_debut</th>
                <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">date_fin</th>
                <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">heure_debut</th>
                <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">heure_fin</th>
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
                {{-- <td class="py-4 px-6 flex items-center space-x-2"> --}}
                    
                    <!-- Delete Form -->
                    
                    {{-- <form action="{{ route('announces.destroy', $announce->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200">
                            Delete
                        </button>
                    </form> --}}

                    {{-- <a href="{{ route('announces.edit', $announce->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                        Edit
                    </a>
                </td> --}}

                {{-- <td>
                    <button data-id="{{ $announce->id }}" class="toggle-status px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">
                        {{ $announce->status }}
                    </button>
                </td> --}}
                
            </tr>
            @endforeach
        </tbody>


    </table>







    
</body>

</html>