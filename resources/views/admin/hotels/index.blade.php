<!-- resources/views/admin/hotels/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Liste des Hôtels')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Liste des Hôtels</h2>

    @if ($hotels->isEmpty())
        <p>Aucun hôtel disponible pour le moment.</p>
    @else
        <div class="card-body">
            <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary">Ajouter un nouvel hôtel</a>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Adresse</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hotels as $hotel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hotel->nom }}</td>
                            <td>{{ $hotel->description }}</td>
                            <td>{{ $hotel->adresse }}</td>
                            <td>
                                <a href="{{ route('admin.hotels.edit', ['hotel' => $hotel->id]) }}" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('admin.hotels.destroy', ['hotel' => $hotel->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
<style>
    /* styles.css */

.card-body {
    margin-bottom: 20px;
}

.table-responsive {
    margin-top: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f8f9fa;
    font-weight: bold;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f2f2f2;
}

.table-striped tbody tr:hover {
    background-color: #e9ecef;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

h2 {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 24px;
}

.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    color: #fff;
    background-color: #0056b3;
    border-color: #004085;
}

.btn-warning {
    color: #212529;
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-warning:hover {
    color: #212529;
    background-color: #e0a800;
    border-color: #d39e00;
}

.btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    color: #fff;
    background-color: #c82333;
    border-color: #bd2130;
}

@media (max-width: 768px) {
    .table-responsive {
        border: 0;
    }

    .table-responsive .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }

    .table-responsive .table thead,
    .table-responsive .table tbody,
    .table-responsive .table th,
    .table-responsive .table td,
    .table-responsive .table tr {
        display: block;
    }

    .table-responsive .table thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    .table-responsive .table tr {
        border: 1px solid #ddd;
    }

    .table-responsive .table td {
        border: none;
        border-bottom: 1px solid #ddd;
        position: relative;
        padding-left: 50%;
        text-align: left;
    }

    .table-responsive .table td:before {
        position: absolute;
        top: 50%;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        transform: translateY(-50%);
        content: attr(data-label);
        font-weight: bold;
    }
}

</style>