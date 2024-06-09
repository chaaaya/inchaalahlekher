<!-- resources/views/admin/rapports/show.blade.php -->

@extends('layouts.admin')

@section('title', 'Détails du Rapport')

@section('content')
    <h2>Détails du Rapport</h2>

    <div>
        <p><strong>Titre:</strong> {{ $rapport->title }}</p>
        <p><strong>Description:</strong> {{ $rapport->description }}</p>
        <p><strong>Créé le:</strong> {{ $rapport->created_at->format('d/m/Y H:i') }}</p>
    </div>
@endsection
