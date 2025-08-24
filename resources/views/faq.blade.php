@extends('layouts.layout')

@section('title', 'FAQ')

@section('content')

    <h1>Veelgestelde vragen</h1>

    <form method="GET" action="{{ route('faq.public') }}">
        <label for="category">Filter op categorie:</label>
        <select name="category" id="category" onchange="this.form.submit()">
            <option value=""> Alle categorieën </option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </form>

    @forelse ($faqs as $category => $items)
        <h2>{{ $category }}</h2>
        <ul>
            @foreach ($items as $faq)
                <li>
                    <strong>{{ $faq->question }}</strong><br>
                    {{ $faq->answer }}
                </li>
            @endforeach
        </ul>
    @empty
        <p>Er zijn nog geen veelgestelde vragen beschikbaar.</p>
    @endforelse
@endsection