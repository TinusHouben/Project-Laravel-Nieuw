@extends('layouts.layout')

@section('title', 'Homepagina')

@section('content')
    <div style="text-align: center;">
        <h1>Het Laatste Nieuws</h1>
        <p>Welkom op de homepagina!</p>
    </div>

    <h2>Laatste nieuws</h2>
    
    <section>
        @foreach ($newsitems as $newsitem)
            <article>
                @if ($newsitem->image)
                    <img src="{{ asset('storage/' . $newsitem->image) }}" alt="{{ $newsitem->title }}">
                @endif

                <div class="article-content">
                    <h3><a href="{{ route('news.show', $newsitem) }}">{{ $newsitem->title }}</a></h3>
                    <p>{{ Str::limit($newsitem->content, 150) }}</p>
                    <small>Gepubliceerd op: {{ $newsitem->published_at->format('d-m-Y') }}</small>
                </div>
            </article>
        @endforeach

        {{ $newsitems->links() }}
    </section>
@endsection