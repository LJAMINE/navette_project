<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>


    <h1>update</h1>

    <form action="{{ route('announce.update', $announce->id)  }}" method="POST">
        @csrf

        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
            <input type="text" id="title" name="title" class="mt-1 p-2 w-full border rounded-lg"
                value="{{ old('title', $announce->title) }}">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-600">Content</label>
            <textarea id="content" name="content" class="mt-1 p-2 w-full border rounded-lg"
                rows="4">{{ old('content', $announce->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nb_place" class="block text-sm font-medium text-gray-600">Number of Places</label>
            <input type="text" id="nb_place" name="nb_place" class="mt-1 p-2 w-full border rounded-lg"
                value="{{ old('nb_place', $announce->nb_place) }}">
            @error('nb_place')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-lg"
                rows="4">{{ old('description', $announce->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4 flex space-x-4">
            <div class="flex-1">
                <label for="date_debut" class="block text-sm font-medium text-gray-600">Start Date</label>
                <input type="date" id="date_debut" name="date_debut" class="mt-1 p-2 w-full border rounded-lg"
                    value="{{ old('date_debut', $announce->date_debut) }}">
                @error('date_debut')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex-1">
                <label for="date_fin" class="block text-sm font-medium text-gray-600">End Date</label>
                <input type="date" id="date_fin" name="date_fin" class="mt-1 p-2 w-full border rounded-lg"
                    value="{{ old('date_fin', $announce->date_fin) }}">
                @error('date_fin')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4 flex space-x-4">
            <div class="flex-1">
                <label for="heure_debut" class="block text-sm font-medium text-gray-600">Start Time</label>
                <input type="time" id="heure_debut" name="heure_debut" class="mt-1 p-2 w-full border rounded-lg"
                    value="{{ old('heure_debut', \Carbon\Carbon::parse($announce->heure_debut)->format('H:i')) }}">
                {{-- value="{{ old('heure_debut',$announce->heure_debut) }}" > --}}
                @error('heure_debut')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex-1">
                <label for="heure_fin" class="block text-sm font-medium text-gray-600">End Time</label>
                <input type="time" id="heure_fin" name="heure_fin" class="mt-1 p-2 w-full border rounded-lg" {{--
                    value="{{ old('heure_fin',$announce->heure_fin) }}"> --}}
                value="{{ old('heure_fin', \Carbon\Carbon::parse($announce->heure_fin)->format('H:i')) }}" >


                @error('heure_fin')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <button type="submit"
                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">update</button>
        </div>
    </form>


</body>

</html>