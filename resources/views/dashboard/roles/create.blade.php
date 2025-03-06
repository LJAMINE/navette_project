<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create roles</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">Create role</h1>

        <form action="/store" method="POST" class="bg-white p-4 rounded-lg shadow-sm w-full max-w-sm mx-auto">
            @csrf

            <div class="mb-3">
                <label for="role" class="block text-xs font-medium text-gray-600">role</label>
                <input type="text" id="role" name="name"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-lg text-sm" value="{{ old('role') }}">
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-2 gap-2">
                @foreach ($permissions as $permission)
                    <label for="per$permission_{{ $permission->id }}"
                        class="flex items-center bg-gray-50 p-2 rounded border border-gray-200 text-sm hover:bg-gray-100">
                        <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]"
                            value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions', [])) }}
                            class="mr-2 h-4 w-4 text-blue-500">
                        <span>{{ $permission->name }}</span>
                    </label>
                @endforeach
            </div>




            <div class="mb-4">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm transition duration-200">Create</button>
            </div>
        </form>
    </div>

</body>

</html>