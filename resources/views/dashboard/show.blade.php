<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <h1> Details</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


        {{-- @foreach ($announces as $announce) --}}

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800"> {{ $announce->title }} </h3>
                <p class="mt-2 text-gray-600"> {{ $announce->nb_place }} </p>
                <p class="mt-2 text-gray-600"> {{ $announce->date_debut }} </p>
                <p class="mt-2 text-gray-600"> {{ $announce->date_fin }} </p>
                <p class="mt-2 text-gray-600"> {{ $announce->heure_debut }} </p>
                <p class="mt-2 text-gray-600"> {{ $announce->heure_fin }} </p>
                {{-- <a href="/announces/{{$announce->id }}" class="mt-4 inline-block text-blue-500 hover:underline">View
                    details</a> --}}

            </div>

        {{-- @endforeach --}}




    </div>

</body>

</html>