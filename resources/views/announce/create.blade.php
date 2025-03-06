<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Announcement</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">Create Announcement</h1>

        <form action="/store/announce" method="POST" class="bg-white p-4 rounded-lg shadow-sm w-full max-w-sm mx-auto">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="block text-xs font-medium text-gray-600">Title</label>
                <input type="text" id="title" name="title" class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm" value="{{ old('title') }}" >
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="block text-xs font-medium text-gray-600">Content</label>
                <textarea id="content" name="content" class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm" rows="3" >{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nb_place" class="block text-xs font-medium text-gray-600">Number of Places</label>
                <input type="number" id="nb_place" name="nb_place" class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm" value="{{ old('nb_place') }}" >
                @error('nb_place')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="block text-xs font-medium text-gray-600">Description</label>
                <textarea id="description" name="description" class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm" rows="3" >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block text-xs font-medium text-gray-600 mb-2">Tags</label>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($tags as $tag)
                        <label for="tag_{{ $tag->id }}" class="flex items-center bg-gray-50 p-2 rounded border border-gray-200 text-sm hover:bg-gray-100">
                            <input type="checkbox" 
                                id="tag_{{ $tag->id }}" 
                                name="tags[]" 
                                value="{{ $tag->id }}" 
                                {{ in_array($tag->id, old('tags', [])) }}
                                class="mr-2 h-4 w-4 text-blue-500">
                            <span >{{ $tag->title }}</span>
                        </label>
                    @endforeach
                </div>
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3 flex space-x-3">
                <div class="flex-1">
                    <label for="date_debut" class="block text-xs font-medium text-gray-600">Start Date</label>
                    <input type="date" id="date_debut" name="date_debut" class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm" value="{{ old('date_debut') }}" >
                    @error('date_debut')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex-1">
                    <label for="date_fin" class="block text-xs font-medium text-gray-600">End Date</label>
                    <input type="date" id="date_fin" name="date_fin" class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm" value="{{ old('date_fin') }}" >
                    @error('date_fin')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3 flex space-x-3">
                <div class="flex-1">
                    <label for="heure_debut" class="block text-xs font-medium text-gray-600">Start Time</label>
                    <input type="time" id="heure_debut" name="heure_debut" class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm" value="{{ old('heure_debut') }}" >
                    @error('heure_debut')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex-1">
                    <label for="heure_fin" class="block text-xs font-medium text-gray-600">End Time</label>
                    <input type="time" id="heure_fin" name="heure_fin" class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm" value="{{ old('heure_fin') }}" >
                    @error('heure_fin')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm transition duration-200">Create</button>
            </div>
        </form>
    </div>

</body>
</html>
