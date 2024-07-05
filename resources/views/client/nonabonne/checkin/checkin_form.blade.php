@extends('layouts.nonabonne')

@section('content-nonabonne')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check-In</div>
                <div class="card-body">
                    <form action="{{ route('abonne.process.checkin') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="reservation_id" class="col-md-4 col-form-label text-md-right">Numéro de Réservation :</label>
                            <div class="col-md-6">
                                <input type="text" id="reservation_id" name="reservation_id" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email :</label>
                            <div class="col-md-6">
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <!-- Optional fields -->
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Nom :</label>
                            <div class="col-md-6">
                                <input type="text" id="last_name" name="last_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">Prénom :</label>
                            <div class="col-md-6">
                                <input type="text" id="first_name" name="first_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="travel_document_number" class="col-md-4 col-form-label text-md-right">Numéro de document de voyage :</label>
                            <div class="col-md-6">
                                <input type="text" id="travel_document_number" name="travel_document_number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Date de naissance :</label>
                            <div class="col-md-6">
                                <input type="date" id="date_of_birth" name="date_of_birth" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Check-In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection