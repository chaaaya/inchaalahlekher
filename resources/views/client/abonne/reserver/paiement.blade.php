@extends('layouts.abonne')

@section('content-abonne')
<div class="conteneur">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('abonne.process.paiement') }}" method="POST" class="paiement-form">
                        @csrf
                        <!-- Champ caché pour le vol_id -->
                        <input type="hidden" name="vol_id" value="{{ $vol->id }}">
                        
                        <!-- Ajouter d'autres champs pour le paiement ici si nécessaire -->
                        
                        <button type="submit" class="btn btn-primary">Réserver</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
