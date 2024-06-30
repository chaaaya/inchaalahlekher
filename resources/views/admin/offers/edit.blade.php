@extends('layouts.admin')

@section('title', 'Modifier une offre')

@section('content')
    <h1>Modifier une offre</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.offers.update', $offer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $offer->title) }}">
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $offer->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prix :</label>
            <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ old('price', $offer->price) }}">
        </div>

        <button type="submit" class="btn btn-primary">Modifier l'offre</button>
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

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    border-radius: 0.25rem;
}

.btn-primary:hover {
    background-color: #0069d9;
    border-color: #0062cc;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}

.alert-danger ul {
    padding-left: 20px;
    margin-bottom: 0;
}

.alert-danger li {
    list-style-type: disc;
}

@media (min-width: 768px) {
    .form-group {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .form-group > label {
        width: 100%;
        margin-bottom: 0.5rem;
    }

    .form-group > .form-control {
        flex: 1 1 30%;
        margin-right: 1.5%;
    }

    .form-group > .form-control:last-child {
        margin-right: 0;
    }
}

</style>