<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- FLASH MESSAGE --}}
            @if(session('success'))
                <div class="p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- BUTTON TAMBAH VIDEO --}}
            <div class="flex justify-end">
                <a href="{{ route('admin.videos.create') }}"
                   class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    + Tambah Video
                </a>
            </div>

            {{-- TABLE VIDEO --}}
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-x-auto">

                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">Judul</th>
                                <th class="px-4 py-2 border">URL</th>
                                <th class="px-4 py-2 border text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($videos as $video)
                                <tr>
                                    <td class="px-4 py-2 border font-medium">
                                        {{ $video->title }}
                                    </td>
                                    <td class="px-4 py-2 border text-sm text-gray-600">
                                        {{ $video->url }}
                                    </td>
                                    <td class="px-4 py-2 border text-center">
                                        <div class="flex justify-center gap-2">

                                            <a href="{{ route('admin.videos.edit', $video->id) }}"
                                               class="px-3 py-1 bg-yellow-500 text-white rounded text-sm hover:bg-yellow-600">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.videos.destroy', $video->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Hapus video ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                                        Belum ada data video
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
