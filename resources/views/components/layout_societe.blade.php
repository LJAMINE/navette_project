<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full bg-gray-100">

    <div class="min-h-full">
        <!-- Navbar -->
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo & Links -->
                    <div class="flex h-16 items-center justify-between w-full">
                        <!-- Logo & Links -->
                        <div class="flex items-center">
                            <div class="shrink-0">
                                <img class="size-8"
                                    src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                    alt="Your Company">
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-10 flex items-baseline space-x-4">
                                    <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Homepage</a>
                                    <a href="/stats" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">stats</a>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Logout Button on the Right -->
                        <div class="hidden md:block">
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                    

                    <!-- Mobile Menu Button (Hidden for now) -->
                    <div class="-mr-2 flex md:hidden">
                        <button class="text-gray-300 hover:text-white focus:outline-none">
                            <!-- Add mobile menu icon here if needed -->
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Your content slot -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

</body>

</html>