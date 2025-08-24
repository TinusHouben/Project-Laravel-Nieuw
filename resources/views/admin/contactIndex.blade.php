@extends('layouts.layout')

@section('title', 'Contactberichten')

@section('content')
    <h1>Ingekomen berichten</h1>

    @if ($messages->isEmpty())
        <p>Er zijn geen berichten.</p>
    @else
        <table cellpadding="10">
            <thead>
                <tr>
                    <th>Gebruiker</th>
                    <th>E-mail</th>
                    <th>Bericht</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->user->name ?? 'Onbekend' }}</td>
                        <td>{{ $message->user->email ?? 'Onbekend' }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection