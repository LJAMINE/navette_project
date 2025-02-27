<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6">Client Dashboard</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Logout Button -->
        <form method="POST" action="/logout" class="mb-6">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200">
                Logout
            </button>
        </form>

        <!-- Dashboard Cards -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


            @foreach ($announces as $announce )

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800"> {{ $announce->title }} </h3>
                <p class="mt-2 text-gray-600"> {{ $announce->nb_place }} </p>
                <p class="mt-2 text-gray-600"> {{ $announce->date_debut }} </p>
                <p class="mt-2 text-gray-600"> {{ $announce->date_fin }} </p>
                <p class="mt-2 text-gray-600"> {{ $announce->heure_debut }} </p>
                <p class="mt-2 text-gray-600"> {{ $announce->heure_fin }} </p>
                <a href="/profile" class="mt-4 inline-block text-blue-500 hover:underline">View Profile</a>
            </div>
            
            @endforeach
           

           

        </div>

        <!-- Additional actions or information can go here -->

    </div>

</body>

</html>
