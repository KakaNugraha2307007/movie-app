<x-app-layout>
<x-slot name="header">
    <h2 class="text-xl font-bold">❤️ Film Favorit</h2>
</x-slot>

<div class="max-w-6xl mx-auto px-4 py-6 space-y-4">

    @forelse ($favorites as $fav)
        <div class="bg-white shadow rounded p-4 flex gap-4">
            <img src="{{ $fav->image }}" class="w-24 h-36 object-cover rounded">

            <div class="flex-1">
                <h3 class="font-bold">{{ $fav->title }}</h3>
                <p class="text-sm">⭐ {{ $fav->rating }}</p>

                <form method="POST" action="{{ route('favorite.destroy', $fav) }}">
                    @csrf
                    @method('DELETE')

                    <button class="text-red-600 text-sm mt-2">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-gray-500">Belum ada favorit.</p>
    @endforelse

</div>
</x-app-layout>
