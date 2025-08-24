@extends('layouts.layout')

@section('title', 'Nieuwsitem bewerken')

@section('content')
    <h1>Nieuwsitem bewerken</h1>

    <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Titel:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}" required>
            @error('title') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="image">Afbeelding:</label>
            @if ($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="Afbeelding" style="max-width: 200px;">
            @endif
            <input type="file" id="image" name="image">
            @error('image') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="content">Inhoud:</label>
            <textarea id="content" name="content" required>{{ old('content', $news->content) }}</textarea>
            @error('content') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="published_at">Publicatiedatum:</label>
            <input type="date" id="published_at" name="published_at" value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}" required>
            @error('published_at') <div>{{ $message }}</div> @enderror
        </div>

        <button type="submit">Nieuwsitem bijwerken</button>
    </form>

    <form method="POST" action="{{ route('news.destroy', $news) }}" onsubmit="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?');">
        @csrf
        @method('DELETE')
        <button type="submit" style="margin-top: 1em; color: red;">Nieuwsitem verwijderen</button>
    </form>
@endsection