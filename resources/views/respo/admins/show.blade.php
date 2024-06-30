@extends('layouts.respo')

@section('title', "Détails de l'administrateur")

@section('content-respo')
    <h1>Détails de l'administrateur {{ $admin->name }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nom:</strong> {{ $admin->name }}</p>
            <p><strong>Numéro de téléphone:</strong> {{ $admin->numero_telephone }}</p>
            <p><strong>Email:</strong> {{ $admin->email }}</p>
        </div>

        <a href="{{ route('respo.admins.edit', $admin->id) }}" class="btn btn-primary">Modifier</a>

        <form action="{{ route('respo.admins.destroy', $admin->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">Supprimer</button>
        </form>

        <a href="{{ route('respo.admins.index') }}" class="btn btn-secondary">Retour à la liste</a>
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

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
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