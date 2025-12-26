<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permintaan Akses Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash message --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-x-auto">

                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">Customer</th>
                                <th class="px-4 py-2 border">Video</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Waktu Akses</th>
                                <th class="px-4 py-2 border text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($requests as $request)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border">
                                        {{ $request->user->name }}
                                    </td>

                                    <td class="px-4 py-2 border">
                                        {{ $request->video->title }}
                                    </td>

                                    <td class="px-4 py-2 border">
                                        @if($request->status === 'pending')
                                            <span class="text-yellow-600 font-semibold">Pending</span>
                                        @elseif($request->status === 'approved')
                                            <span class="text-green-600 font-semibold">Approved</span>
                                        @else
                                            <span class="text-red-600 font-semibold">Rejected</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-2 border">
                                        @if($request->expired_at)
                                            {{ \Carbon\Carbon::parse($request->expired_at)->format('d M Y H:i') }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td class="px-4 py-2 border">
                                        @if($request->status === 'pending')
                                            <div class="flex justify-center gap-2">

                                                {{-- APPROVE --}}
                                                <form
                                                    action="{{ route('admin.requests.approve', $request->id) }}"
                                                    method="POST"
                                                    class="flex items-center gap-2">
                                                    @csrf

                                                    <input
                                                        type="number"
                                                        name="duration"
                                                        min="1"
                                                        placeholder="Jam"
                                                        class="w-20 rounded border-gray-300 text-sm"
                                                        required>

                                                    <button
                                                        type="submit"
                                                        class="px-3 py-1 bg-green-600 text-white rounded text-sm hover:bg-green-700">
                                                        Approve
                                                    </button>
                                                </form>

                                                {{-- REJECT --}}
                                                <form
                                                    action="{{ route('admin.requests.reject', $request->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        type="submit"
                                                        class="px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700">
                                                        Reject
                                                    </button>
                                                </form>

                                            </div>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                        Tidak ada permintaan akses
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
