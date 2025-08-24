@extends('layouts.layout')

@section('title', 'FAQ Beheer')

@section('content')
    <h1>FAQ Beheer</h1>

    <h2>FAQ-Items</h2>

    <table cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Vraag</th>
                <th>Categorie</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($faqs as $faq)
                <tr>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->category->name }}</td>
                    <td>
                        <a href="{{ route('faq.edit', $faq) }}">Bewerken</a>
                        <form action="{{ route('faq.destroy', $faq) }}" method="POST" style="display:inline;" onsubmit="return confirm('Zeker verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Geen FAQ's gevonden.</td></tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('faq.create') }}">Nieuwe FAQ toevoegen</a>


    <h2>FAQ-Categorieën</h2>

    <table cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('faq.categories.edit', $category) }}">Bewerken</a>
                        <form action="{{ route('faq.categories.destroy', $category) }}" method="POST" style="display:inline;" onsubmit="return confirm('Weet je zeker dat je deze categorie wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Er zijn nog geen categorieën.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Nieuwe categorie aanmaken</h2>

    <form method="POST" action="{{ route('faq.categories.store') }}">
        @csrf

        <div>
            <label for="name">Categorie naam:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <button type="submit">Aanmaken</button>
    </form>

    @if (session('status'))
        <div style="color: green;">{{ session('status') }}</div>
    @endif

@endsection