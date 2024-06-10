@extends('layouts.respo')

@section('title', 'Détails du Rapport')

@section('content-respo')
    <div class="container">
        <h1>Détails du Rapport</h1>
        <div>
            <h2>{{ $rapport->titre }}</h2>
            <p>{{ $rapport->description }}</p>
            <p>Date de création: {{ $rapport->created_at->format('d-m-Y') }}</p>
            <a href="{{ route('respo.reports.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
@endsection
