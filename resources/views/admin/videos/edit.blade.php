<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg p-6">
                <form method="POST"
                      action="{{ route('admin.videos.update', $video->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- JUDUL --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Judul Video
                        </label>
                        <input type="text" name="title"
                               value="{{ old('title', $video->title) }}"
                               class="mt-1 block w-full rounded border-gray-300"
                               required>
                    </div>

                    {{-- URL --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">
                            URL Video
                        </label>
                        <input type="url" name="url"
                               value="{{ old('url', $video->url) }}"
                               class="mt-1 block w-full rounded border-gray-300"
                               required>
                    </div>

                    {{-- BUTTON --}}
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.videos.index') }}"
                           class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                            Batal
                        </a>
                        <button
                            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Update
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
