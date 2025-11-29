<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow mt-8">
        <h2 class="text-2xl font-semibold mb-6">Edit Program Studi</h2>

        <form action="{{ route('admin.landing.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Program</label>
                <input type="text" name="title" value="{{ old('title', $program->title) }}" class="w-full border border-gray-300 rounded-md p-2" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-md p-2">
                @if ($program->image)
                    <div class="mt-3">
                        <p class="text-sm text-gray-600">Current image:</p>
                        <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="h-32 rounded border mt-2">
                    </div>
                @endif
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Posisi</label>
                <input type="number" name="position" value="{{ old('position', $program->position) }}" class="w-full border border-gray-300 rounded-md p-2" required>
                @error('position')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.landing.programs.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
