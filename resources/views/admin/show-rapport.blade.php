<!-- resources/views/admin/show-rapport.blade.php -->
<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.admin')

@section('title', 'Détails du Rapport')

@section('content-admin')
    <h1>Détails du Rapport</h1>

    <div class="card">
        <div class="card-header">
            {{ $rapport->title }}
        </div>
        <div class="card-body">
            <p>{{ $rapport->description }}</p>
            <p><strong>Date de création :</strong> {{ $rapport->created_at->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <a href="{{ route('manage-rapports') }}" class="btn btn-primary mt-3">Retour à la liste</a>
@endsection