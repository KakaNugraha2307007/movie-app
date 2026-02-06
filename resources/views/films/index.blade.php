<x-app-layout>
<x-slot name="header">🎬 Kaka Film</x-slot>

<a href="{{ route('films.create') }}">+ Tambah Film</a>

@foreach($films as $film)
    <div>
        <h3>{{ $film->title }}</h3>
        <form action="{{ route('films.destroy',$film) }}" method="POST">
            @csrf @method('DELETE')
            <a href="{{ route('films.edit',$film) }}">Edit</a>
            <button>Hapus</button>
        </form>
    </div>
@endforeach
</x-app-layout>
