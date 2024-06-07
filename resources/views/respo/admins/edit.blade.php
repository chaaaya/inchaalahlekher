@extends('layouts.respo')

@section('title', 'Modifier Administrateur')

@section('styles')
    <style>
        .page-title {
            margin-bottom: 20px;
        }

        .card {
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .btn-primary,
        .btn-secondary {
            margin-right: 10px;
        }
    </style>
@endsection

@section('content-respo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="page-title">Modifier Administrateur</h1>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('respo.admins.update', $admin->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="numero_telephone">Numéro de téléphone</label>
                                <input type="text" class="form-control" id="numero_telephone" name="numero_telephone" value="{{ $admin->numero_telephone }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="{{ route('respo.admins.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
