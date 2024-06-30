@extends('layouts.respo')

@section('title', 'Modifier Utilisateur')

@section('content-respo')
    <h1>Modifier Utilisateur</h1>
    
    <form action="{{ route('respo.admins.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $admin->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $admin->email }}" required>
        </div>
        <div class="form-group">
            <label for="numero_telephone">Numéro de téléphone</label>
            <input type="text" id="numero_telephone" name="numero_telephone" class="form-control" value="{{ $admin->numero_telephone }}" required>
        </div>
        <div class="button-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('respo.admins.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
@endsection

    <style>
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
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

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .button-group {
            margin-top: 1rem;
        }

        @media (min-width: 768px) {
            .button-group {
                display: flex;
                justify-content: end;
            }

            .button-group .btn {
                width: 10%;
                margin: 6px;
            }
        }
    </style>
