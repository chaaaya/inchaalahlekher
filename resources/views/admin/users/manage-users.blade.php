@extends('layouts.admin')

@section('content')
    <h1>Gérer les utilisateurs</h1>

    <div class="card mt-4">
        <div class="card-header">
            Clients
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $client->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                <a href="{{ route('users.message', $client->id) }}" class="btn btn-sm btn-warning">Envoyer un message</a>
 
                                
                                <form action="{{ route('admin.users.destroy', $client->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Bouton pour la suppression -->
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Abonnements en attente
        </div>
        <div class="card-body">
            @if ($clientsPendingApproval->isEmpty())
                <p>Aucun abonnement en attente.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientsPendingApproval as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>
                                    <form action="{{ route('admin.users.subscription.accept', $client->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success">Accepter</button>
                                    </form>
                                    
                                    <form action="{{ route('admin.users.subscription.reject', $client->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-danger">Refuser</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Créer un nouveau client
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="numero_telephone">Numéro de téléphone</label>
                    <input type="text" class="form-control" id="numero_telephone" name="numero_telephone" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>
    </div>
@endsection
