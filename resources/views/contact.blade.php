@extends('layouts.layout')

@section('title', 'Contacteer ons')

@section('content')
    <h1>Contacteer ons</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        <div>
            <label for="message">Bericht:</label><br>
            <textarea name="message" id="message" rows="6" cols="50" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit">Versturen</button>
    </form>

    @if (session('status'))
        <div style="color: green;">{{ session('status') }}</div>
    @endif
    
@endsection