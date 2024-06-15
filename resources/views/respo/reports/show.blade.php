<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('title', 'Détails du Rapport')

@section('content-respo')
    <h1>Détails du Rapport</h1>
    <div class="card">
       <div class="card-body">
             <h2>{{ $rapport->titre }}</h2>
                <p><strong>Description : </strong>{{ $rapport->description }}</p>
                <p><strong>Date de création : </strong> de création: {{ $rapport->created_at->format('d-m-Y') }}</p>
                <a href="{{ route('respo.reports.index') }}" class="btn btn-secondary">Retour</a>
       </div>
    </div>
@endsection