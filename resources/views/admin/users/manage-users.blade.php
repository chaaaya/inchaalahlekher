@extends('layouts.admin')

@section('content')
    <h1>Gérer les utilisateurs</h1>

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
                        <form action="{{ route('admin.users.accept', $client->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Accepter</button>
                        </form>
                        
                        <form action="{{ route('admin.users.reject', $client->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Refuser</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
