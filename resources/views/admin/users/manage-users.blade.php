
@extends('layouts.admin')

@section('content')
    <h1>Gérer les utilisateurs</h1>

    <div class="card mt-4">
        <div class="card-header">
            Liste des utilisateurs
        </div>
        <div class="card-body">
            @if ($clients->isEmpty())
                <p>Aucune utilisateur trouvé.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Numéro de téléphone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->numero_telephone }}</td>
                                <td>
                                    <form action="{{ route('admin.users.accept', $client->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success">Accepter</button>
                                    </form>
                                    
                                    <form action="{{ route('admin.users.reject', $client->id) }}" method="POST" style="display: inline;">
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
@endsection