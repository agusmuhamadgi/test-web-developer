<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Katalog Video</h2>
    </x-slot>
@if (session('success'))
    <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 rounded bg-red-100 px-4 py-3 text-red-800">
        {{ session('error') }}
    </div>
@endif

    <div class="py-6 max-w-7xl mx-auto">
        @foreach($videos as $video)
            <div class="p-4 mb-4 bg-white shadow rounded">
                <h3 class="font-bold">{{ $video->title }}</h3>
                <p class="text-sm text-gray-600">{{ $video->description }}</p>

                <div class="mt-2 flex gap-2">
                    <form method="POST" action="{{ route('videos.request', $video->id) }}">
                        @csrf
                        <button class="px-3 py-1 bg-blue-600 text-white rounded">
                            Request Akses
                        </button>
                    </form>

                    <a href="{{ route('videos.watch', $video->id) }}"
                       class="px-3 py-1 bg-green-600 text-white rounded">
                        Tonton
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
