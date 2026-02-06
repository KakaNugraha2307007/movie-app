<x-app-layout>
<form method="POST" action="{{ route('films.store') }}">
@csrf
<input name="title" placeholder="Judul Film">
<input name="image" placeholder="URL Gambar">
<input name="rating" placeholder="Rating">
<textarea name="summary"></textarea>
<button>Simpan</button>
</form>
</x-app-layout>
