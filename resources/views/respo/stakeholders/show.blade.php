<!-- resources/views/respo/stakeholders/show.blade.php -->

@extends('layouts.respo')

@section('title', 'Détails de la Partie Prenante')

@section('content-respo')

<div class="section-container">
    <h2>Détails de la Partie Prenante : {{ $stakeholder->name }}</h2>
    <p><strong>Nom :</strong> {{ $stakeholder->name }}</p>
    <p><strong>Rôle :</strong> {{ $stakeholder->role }}</p>
    <p><strong>Email :</strong> {{ $stakeholder->email }}</p>
    <!-- Ajoutez d'autres détails si nécessaire -->
</div>

@endsection
