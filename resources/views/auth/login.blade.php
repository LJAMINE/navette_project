<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">Login</h1>

        @if (session('success'))
        <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-6">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div id="flash" class="p-4 text-center bg-red-50 text-red-500 font-bold mb-6">
            {{ session('error') }}
        </div>
    @endif
    
        <form action="/login" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-600 font-medium">Email</label>
                <input type="email" name="email" class="w-full p-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300" >
            </div>
            @error('email')
            <p class="text-xs text-red-500 "> {{ $message  }} </p>
        @enderror

            <div>
                <label class="block text-gray-600 font-medium">Password</label>
                <input type="password" name="password" class="w-full p-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300" >
            </div>
            @error('password')
            <p class="text-xs text-red-500 "> {{ $message  }} </p>
        @enderror

            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">
                Login
            </button>
        </form>

        <p class="mt-4 text-center text-gray-600">
            Don't have an account?
            <a href="/register" class="text-blue-500 hover:underline">Register</a>
        </p>
    </div>
</body>

</html>
