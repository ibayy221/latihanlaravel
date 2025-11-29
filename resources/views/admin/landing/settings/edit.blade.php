<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow mt-8">
        <h2 class="text-2xl font-semibold mb-6">Edit Setting: {{ ucfirst(str_replace('_', ' ', $setting->key)) }}</h2>

        <form action="{{ route('admin.landing.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ ucfirst(str_replace('_', ' ', $setting->key)) }}</label>
                
                @if ($setting->type === 'image')
                    <div class="mb-4">
                        <label class="block text-sm text-gray-600 mb-2">Pilih File</label>
                        <input type="file" name="value" accept="image/*" class="w-full border border-gray-300 rounded-md p-2">
                        <p class="text-xs text-gray-500 mt-1">Tidak ada file yang dipilih</p>
                    </div>
                    
                    @if ($setting->value)
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg border">
                            <p class="text-sm font-medium text-gray-700 mb-3">Current image:</p>
                            <img src="{{ asset('storage/' . $setting->value) }}" alt="{{ $setting->key }}" class="max-w-md h-auto rounded border">
                        </div>
                    @endif
                @else
                    <textarea name="value" rows="4" class="w-full border border-gray-300 rounded-md p-2">{{ old('value', $setting->value) }}</textarea>
                @endif

                @error('value')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 font-medium">
                    Save Changes
                </button>
                <a href="{{ route('admin.landing.settings.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400 font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
