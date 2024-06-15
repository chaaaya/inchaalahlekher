@extends('layouts.respo')

@section('title', 'Liste des Administrateurs')

@section('content-respo')
    <h1>Liste des Administrateurs</h1>
    <a href="{{ route('respo.admins.create') }}" class="btn btn-primary mb-3">Ajouter un administrateur</a>
     
    <div class="card mt-4">
       <div class="card-header">
          Liste des administrateurs
        </div>
        <div class="card-body">
           @if ($admins->isEmpty())
               <p>Aucun administrateur trouvé.</p>
            @else
              <table class="table">
                 <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Numéro de téléphone</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->numero_telephone }}</td> <!-- Affichage du numéro de téléphone -->
                        <td class="admin-list-actions">
                            <a href="{{ route('respo.admins.show', $admin->id) }}" class="btn btn-sm btn-info">Voir</a>
                            <a href="{{ route('respo.admins.edit', $admin->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                            <form action="{{ route('respo.admins.destroy', $admin->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@endsection
