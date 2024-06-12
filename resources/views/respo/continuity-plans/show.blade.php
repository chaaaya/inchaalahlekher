@extends('layouts.respo')

@section('title', 'Détails du Plan de Continuité')

@section('content-respo')
    <div class="container">
        <h1>Détails du Plan de Continuité</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $plan->title }}</h5>
                <p class="card-text">{{ $plan->description }}</p>
                <p class="card-text"><small class="text-muted">Créé le {{ $plan->created_at->format('d-m-Y H:i:s') }}</small></p>
            </div>
        </div>

        <a href="{{ route('respo.continuity-plans.index') }}" class="btn btn-primary mt-3">Retour à la liste des plans de continuité</a>
    </div>
@endsection
