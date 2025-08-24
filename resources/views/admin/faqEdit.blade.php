@extends('layouts.layout')

@section('title', 'FAQ-item bewerken')

@section('content')
    <h1>FAQ-item bewerken</h1>

    <form method="POST" action="{{ route('faq.update', $faq->id) }}">
        @csrf
        @method('PUT')

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
            <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" required>
        </div>

        <div>
            <label for="answer">Antwoord:</label>
            <textarea name="answer" id="answer" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <button type="submit">Bijwerken</button>
    </form>
@endsection