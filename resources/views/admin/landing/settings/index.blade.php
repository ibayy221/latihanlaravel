<x-app-layout>
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Landing Settings</h2>
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Setting
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
                        <th class="px-4 py-2 text-left">Key</th>
                        <th class="px-4 py-2 text-left">Value</th>
                        <th class="px-4 py-2 text-left">Type</th>
                        <th class="px-4 py-2 text-center">Status</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($settings as $setting)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $setting->key }}</td>
                            <td class="px-4 py-2">
                                @if ($setting->type === 'image' && $setting->value)
                                    <img src="{{ asset('storage/' . $setting->value) }}" alt="{{ $setting->key }}" class="h-16 rounded">
                                @else
                                    <span class="text-gray-700">{{ Str::limit($setting->value, 100) }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $setting->type }}</td>
                            <td class="px-4 py-2 text-center">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Active</span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('admin.landing.settings.edit', $setting->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">No settings found</td>
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
