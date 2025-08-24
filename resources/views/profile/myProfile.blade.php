@extends('layouts.layout')

@section('title', 'Mijn profiel')

@section('content')
    <h1>Mijn profiel</h1>

    <p><strong>Naam:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <p><strong>Verjaardag:</strong>
        {{ $user->birthday ?? 'Niet ingevuld' }}
    </p>

    <p><strong>Over mij:</strong><br>
        {{ $user->about_me ?? 'Geen info beschikbaar.' }}
    </p>

    @if ($user->profile_picture)
        <p><strong>Profielfoto:</strong></p>
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" width="150">
    @endif

    <a href="{{ route('profile.edit') }}">
        <button type="button">Profiel aanpassen</button>
    </a>
@endsection