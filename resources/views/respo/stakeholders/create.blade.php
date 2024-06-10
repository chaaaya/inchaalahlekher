@extends('layouts.respo')

@section('content-respo')
    <div class="container">
        <h1>Ajouter un Stakeholder</h1>

        <form action="{{ route('respo.stakeholders.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="role">Rôle:</label>
                <input type="text" id="role" name="role" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
