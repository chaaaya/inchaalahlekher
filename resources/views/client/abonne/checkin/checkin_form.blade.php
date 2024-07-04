@extends('layouts.abonne')

@section('content-abonne')
<div class="container">
    <h2>Check-In</h2>
    <form action="{{ route('abonne.checkin.process') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="reservation_id">Numéro de Réservation :</label>
            <input type="text" id="reservation_id" name="reservation_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Check-In</button>
    </form>
</div>
@endsection
