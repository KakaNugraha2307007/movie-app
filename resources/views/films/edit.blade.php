<x-app-layout>
<form method="POST" action="{{ route('films.update',$film) }}">
@csrf @method('PUT')
<input name="title" value="{{ $film->title }}">
<input name="image" value="{{ $film->image }}">
<input name="rating" value="{{ $film->rating }}">
<textarea name="summary">{{ $film->summary }}</textarea>
<button>Update</button>
</form>
</x-app-layout>
