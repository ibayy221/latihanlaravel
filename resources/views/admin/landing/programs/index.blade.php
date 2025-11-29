<x-app-layout>
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Program Studi</h2>
            <a href="{{ route('admin.landing.programs.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                + Tambah Program
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($programs as $program)
                <div class="border rounded-lg p-4 hover:shadow-lg transition">
                    @if ($program->image)
                        <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-48 object-cover rounded mb-3">
                    @else
                        <div class="w-full h-48 bg-gray-200 rounded mb-3 flex items-center justify-center">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif
                    
                    <h3 class="text-lg font-semibold text-gray-800">{{ $program->title }}</h3>
                    <p class="text-sm text-gray-500 mt-1">Position: {{ $program->position }}</p>
                    
                    <div class="flex gap-2 mt-4">
                        <a href="{{ route('admin.landing.programs.edit', $program->id) }}" class="flex-1 text-center bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700 text-sm">
                            Edit
                        </a>
                        <form action="{{ route('admin.landing.programs.destroy', $program->id) }}" method="POST" style="flex: 1;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 text-white px-3 py-2 rounded hover:bg-red-700 text-sm" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-2 bg-gray-100 p-8 rounded text-center text-gray-500">
                    No programs found
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">← Back to Dashboard</a>
        </div>
    </div>
</x-app-layout>
