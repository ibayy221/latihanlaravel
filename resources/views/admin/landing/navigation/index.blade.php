<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Menu Navigasi</h2>
            <a href="{{ route('admin.landing.navigation.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                + Tambah Menu
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-2 text-left">Label</th>
                        <th class="px-4 py-2 text-left">URL</th>
                        <th class="px-4 py-2 text-left">Position</th>
                        <th class="px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $item->label }}</td>
                            <td class="px-4 py-2">{{ $item->url }}</td>
                            <td class="px-4 py-2">{{ $item->position }}</td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="{{ route('admin.landing.navigation.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="{{ route('admin.landing.navigation.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">No menu items found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">← Back to Dashboard</a>
        </div>
    </div>
</x-app-layout>
