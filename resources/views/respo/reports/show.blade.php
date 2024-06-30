@extends('layouts.respo')

@section('title', 'Détails du Rapport')

@section('content-respo')
    <h1>Détails du Rapport</h1>

    <div class="card">
        <div class="card-body">
            <h2>{{ $rapport->titre }}</h2>
            <p><strong>Description :</strong> {{ $rapport->description }}</p>
            <p><strong>Date de création :</strong> {{ $rapport->created_at->format('d-m-Y') }}</p>
            
            <a href="{{ route('respo.reports.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
@endsection

    <style>
        .card {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #fff;
            float: left;
        }

        .card-body {
            margin-bottom: 20px;
        }

        .card-body h2 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .card-body p {
            margin: 0;
            padding: 8px 0;
            font-size: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>