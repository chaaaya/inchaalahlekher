<!-- resources/views/client/abonne/success.blade.php -->

@extends('layouts.nonabonne')

@section('content-nonabonne')
    <div class="container">
        <h1>Félicitations, votre abonnement a été accepté !</h1>
        <p>Merci pour votre confiance. Vous pouvez maintenant vous déconnecter et vous reconnecter pour accéder à votre compte abonné.</p>
        <form action="{{ route('client.logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Se déconnecter</button>
        </form>   </div>
@endsection

<style>
    /* Styles specific to this view */
    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    p {
        margin-bottom: 20px;
    }

    .btn {
        background-color: #337ab7;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #23527c;
    }
</style>