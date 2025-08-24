@extends('layouts.layout')

@section('title', 'Gebruikersbeheer')

@section('content')
<h1>Gebruikersoverzicht</h1>

<table cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <form method="POST" action="{{ route('admin.updateRole', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <select name="role">
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <button type="submit">Opslaan</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Nieuwe gebruiker aanmaken</h3>

<form method="POST" action="{{ route('admin.store') }}">
    @csrf

    <div>
        <label for="name">Naam:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="email">E-mailadres:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div>
        <label for="role">Rol:</label>
        <select name="role" id="role">
            <option value="user">Gebruiker</option>
            <option value="admin">Admin</option>
        </select>
    </div>

    <button type="submit">Gebruiker aanmaken</button>
</form>

@if (session('status'))
    <div style="color: green;">{{ session('status') }}</div>
@endif

@endsection