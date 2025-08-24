@extends('layouts.layout')

@section('title', 'Categorie bewerken')

@section('content')
    <h1>Categorie bewerken</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('faq.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Naam:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <button type="submit">Opslaan</button>
        <a href="{{ route('faq.categories.index') }}">Annuleren</a>
    </form>
@endsection