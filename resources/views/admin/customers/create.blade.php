<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.customers.store') }}">
                    @csrf

                    {{-- NAMA --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Nama
                        </label>
                        <input type="text" name="name"
                               value="{{ old('name') }}"
                               class="mt-1 block w-full rounded border-gray-300"
                               required>
                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <input type="email" name="email"
                               value="{{ old('email') }}"
                               class="mt-1 block w-full rounded border-gray-300"
                               required>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <input type="password" name="password"
                               class="mt-1 block w-full rounded border-gray-300"
                               required>
                    </div>

                    {{-- BUTTON --}}
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.customers.index') }}"
                           class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                            Batal
                        </a>
                        <button
                            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
