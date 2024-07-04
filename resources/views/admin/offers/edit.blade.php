@extends('layouts.admin')

@section('title', 'Modifier une offre')

@section('content')
    <h1>Modifier l'offre</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $offer->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $offer->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="percentage_discount">Réduction</label>
            <input type="number" name="percentage_discount" id="percentage_discount" class="form-control" value="{{ $offer->percentage_discount }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($offer->image)
                <img src="{{ asset('images/'.$offer->image) }}" alt="{{ $offer->title }}" width="100">
            @endif
        </div>
        {{-- <div class="form-group">
            <label for="vols">Vols associés</label>
            <select name="vols[]" id="vols" class="form-control" multiple>
                @foreach ($vols as $vol)
                    <option value="{{ $vol->id }}" {{ in_array($vol->id, $offer->vols->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $vol->numero_vol }} - {{ $vol->ville_depart }} à {{ $vol->ville_arrivee }}
                    </option>
                @endforeach
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
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