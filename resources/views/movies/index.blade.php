<x-app-layout>
<x-slot name="header">
    <h2 class="text-xl font-bold">🎬 Kaka Films</h2>
</x-slot>

<div class="max-w-6xl mx-auto px-4 py-6">

    <form method="GET" class="mb-6 flex gap-2">
        <input type="text" name="q"
            value="{{ $query }}"
            placeholder="Cari film..."
            class="border rounded px-4 py-2 w-64">

        <button class="bg-blue-600 text-white px-4 rounded">
            Cari
        </button>
    </form>

    <div class="space-y-4">
        @foreach ($movies as $movie)
            <div class="bg-white shadow rounded p-4 flex gap-4">
                <img
                    src="{{ $movie['image']['medium'] ?? 'https://via.placeholder.com/210x295' }}"
                    class="w-28 h-40 object-cover rounded">

                <div class="flex-1">
                    <h3 class="font-bold text-lg">{{ $movie['name'] }}</h3>
                    <p class="text-sm mb-2">⭐ {{ $movie['rating']['average'] ?? '-' }}</p>

                    <form action="{{ route('favorite.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{ $movie['id'] }}">
                        <input type="hidden" name="title" value="{{ $movie['name'] }}">
                        <input type="hidden" name="image" value="{{ $movie['image']['medium'] ?? '' }}">
                        <input type="hidden" name="rating" value="{{ $movie['rating']['average'] ?? '' }}">

                        <button class="bg-red-500 text-white px-3 py-1 rounded">
                            ❤️ Tambah Favorit
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-app-layout>
