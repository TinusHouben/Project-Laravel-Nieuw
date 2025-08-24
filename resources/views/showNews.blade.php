@extends('layouts.layout')

@section('title', $news->title)

@section('content')
    <h1>{{ $news->title }}</h1>

    @if ($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="max-width: 600px;">
    @endif

    <p>{!! nl2br(e($news->content)) !!}</p>

    <small>Gepubliceerd op: {{ $news->published_at->format('d-m-Y') }}</small>
@endsection