<!-- resources/views/admin/rapports/show.blade.php -->
<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.admin')

@section('title', 'Détails du Rapport')

@section('content')
    <h2>Détails du Rapport</h2>

    <div class="card">
            <p>{{ $rapport->title }}</p>
             <p><strong>Description:</strong> {{ $rapport->description }}</p>
             <p><strong>Créé le:</strong> {{ $rapport->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <a href="{{ route('admin.rapports.index') }}" class="btn btn-primary mt-3">Retour à la liste des rapports</a>
@endsection