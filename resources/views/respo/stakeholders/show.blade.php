<!-- resources/views/respo/stakeholders/show.blade.php -->
<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('title', 'Détails de la Partie Prenante')

@section('content-respo')

<div class="card">
    <div class="card-body">
        <h2>Détails de la Partie Prenante : {{ $stakeholder->name }}</h2>
            <p><strong>Nom :</strong> {{ $stakeholder->name }}</p>
            <p><strong>Rôle :</strong> {{ $stakeholder->role }}</p>
            <p><strong>Email :</strong> {{ $stakeholder->email }}</p>
        <!-- Ajoutez d'autres détails si nécessaire -->
        <a href="{{ route('respo.stakeholders.index') }}" class="btn btn-secondary">Retour</a>

   </div>
</div>

@endsection