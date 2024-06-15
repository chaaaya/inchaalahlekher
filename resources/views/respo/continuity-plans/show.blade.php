<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('title', 'Détails du Plan de Continuité')

@section('content-respo')
        <h1>Détails du Plan de Continuité</h1>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Titre : {{ $plan->title }}</h3>
                <p class="card-text"><strong>Description : </strong>  {{ $plan->description }}</p>
                <p class="card-text"><strong>Créé le :</strong> {{ $plan->created_at->format('d-m-Y H:i:s') }}</small></p>
            </div>
        </div>

        <a href="{{ route('respo.continuity-plans.index') }}" class="btn btn-primary mt-3">Retour à la liste des plans de continuité</a>
@endsection