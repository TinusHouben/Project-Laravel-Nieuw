@extends('layouts.layout')

@section('title', 'Nieuwsbeheer')

@section('content')
    <h1>Nieuws beheren</h1>

    <a href="{{ route('news.create') }}" style="display: inline-block; margin-bottom: 15px;">Nieuw nieuwsitem</a>

    <table cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Publicatiedatum</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($newsitems as $news)
                <tr>
                    <td>{{ $news->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($news->published_at)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('news.edit', $news) }}">Bewerken</a>
                        <form action="{{ route('news.destroy', $news) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Er zijn nog geen nieuwsitems.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if (session('status'))
        <div style="color: green;">
            {{ session('status') }}
        </div>
    @endif
@endsection