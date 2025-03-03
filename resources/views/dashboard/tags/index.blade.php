<x-layout_admin>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6"> Tag page</h1>

        @if (session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif



        <a href="/create"
            class="mb-6 inline-block px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
            Create
        </a>


        <!-- Announce Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Title</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">description</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach ($tags as $tag)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6">{{ $tag->title }}</td>
                            <td class="py-4 px-6">{{ $tag->description }}</td>

                            <td class="py-4 px-6 flex items-center space-x-2">
                                <!-- Edit Button -->
                                <a href="{{  route('tag.edit', $tag->id) }}"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                                    Edit
                                </a>

                                <!-- Delete Form -->
                                <form action="{{ route('tag.destroy',$tag->id) }}" method="Post">
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


</x-layout_admin>