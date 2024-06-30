@extends('layouts.respo')

@section('title', 'Modifier un Plan de Continuité')

@section('content-respo')
    <h1>Modifier le Plan de Continuité</h1>

    <form action="{{ route('respo.continuity-plans.update', $plan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $plan->title }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" class="form-control">{{ $plan->description }}</textarea>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <a href="{{ route('respo.continuity-plans.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </div>
        </div>
    </form>
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

        .card-body .form-group {
            margin-bottom: 1.5rem;
        }

        .card-body .form-group label {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card-body .form-control {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .card-body .button-group {
            margin-top: 20px;
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
    </style>