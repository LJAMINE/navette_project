<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tags</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">Create Tags</h1>

        <form action="/store" method="POST" class="bg-white p-4 rounded-lg shadow-sm w-full max-w-sm mx-auto">
            @csrf

            <div class="mb-3">
                <label for="title" class="block text-xs font-medium text-gray-600">Title</label>
                <input type="text" id="title" name="title"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm" value="{{ old('title') }}">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="block text-xs font-medium text-gray-600">Description</label>
                <textarea id="description" name="description"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm"
                    rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-4">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm transition duration-200">Create</button>
            </div>
        </form>
    </div>

</body>

</html>