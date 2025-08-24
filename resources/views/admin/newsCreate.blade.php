@extends('layouts.layout')

@section('title', 'Nieuw nieuwsitem aanmaken')

@section('content')
    <h1>Nieuw nieuwsitem aanmaken</h1>

    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Titel:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="image">Afbeelding:</label>
            <input type="file" id="image" name="image">
            @error('image') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="content">Inhoud:</label>
            <textarea id="content" name="content" required>{{ old('content') }}</textarea>
            @error('content') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="published_at">Publicatiedatum:</label>
            <input type="date" id="published_at" name="published_at" value="{{ old('published_at') }}" required>
            @error('published_at') <div>{{ $message }}</div> @enderror
        </div>

        <button type="submit">Nieuwsitem opslaan</button>
    </form>
@endsection