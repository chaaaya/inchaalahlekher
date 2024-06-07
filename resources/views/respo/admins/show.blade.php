@extends('layouts.respo')

@section('title', 'Détails de l\'administrateur')

@section('content-respo')
    <div class="container">
        <h1>Détails de l'administrateur {{ $admin->name }}</h1>
        <p><strong>Nom:</strong> {{ $admin->name }}</p>
        <p><strong>Numéro de téléphone:</strong> {{ $admin->numero_telephone }}</p>
        <p><strong>Email:</strong> {{ $admin->email }}</p>
        <a href="{{ route('respo.admins.edit', $admin->id) }}" class="btn btn-primary">Modifier</a>
        <form action="{{ route('respo.admins.destroy', $admin->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">Supprimer</button>
        </form>
        <a href="{{ route('respo.admins.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
@endsection
