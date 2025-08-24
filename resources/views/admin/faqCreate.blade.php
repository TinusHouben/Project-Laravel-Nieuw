@extends('layouts.layout')

@section('title', 'FAQ-item aanmaken')

@section('content')
    <h1>FAQ-item aanmaken</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('faq.store') }}">
        @csrf

        <div>
            <label for="category_id">Categorie:</label>
            <select name="category_id" id="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="question">Vraag:</label>
            <input type="text" name="question" id="question" required>
        </div>

        <div>
            <label for="answer">Antwoord:</label>
            <textarea name="answer" id="answer" rows="5" required></textarea>
        </div>

        <button type="submit">Opslaan</button>
    </form>
@endsection