<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">{{ $video->title }}</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white p-6 shadow rounded">
            <iframe
                class="w-full h-96"
                src="{{ $video->url }}"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</x-app-layout>
