@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Envoyer un message à {{ $client->name }}</div>

            <div class="card-body">
                <div class="mb-4">
                    <h5>Messages prédéfinis</h5>
                    <div class="predefined-messages">
                        @foreach($predefinedMessages as $message)
                        <div class="message-item mb-3">
                            <textarea class="form-control message-content" rows="3">{{ $message }}</textarea>
                            <input type="hidden" name="predefined_message" value="{{ $message }}">
                            <button class="btn btn-primary send-message" form="custom-message-form">Envoyer</button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <hr>

                <form action="{{ route('users.send-message', $client->id) }}" method="POST" class="custom-message-form">
                    @csrf
                    <div class="form-group row">
                        <label for="message" class="col-sm-2 col-form-label">Message personnalisé</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="message" name="message" rows="5"
                                placeholder="Écrivez votre message ici..." style="width: 100%; border-radius: 5px;"
                                required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.send-message').forEach(function(button) {
            button.addEventListener('click', function() {
                const form = document.getElementById(this.form);
                form.querySelector('textarea[name="message"]').value = this.previousElementSibling.value;
                form.submit();
            });
        });
    });
</script>
@endsection

<style>
.mb-4 {
    margin-bottom: 1.5rem; /* Marge en bas pour l'élément avec la classe mb-4 */
}

.message-item {
    border: 1px solid #ddd; /* Bordure des éléments de message */
    padding: 10px;
    background-color: #f9f9f9; /* Couleur de fond pour les messages prédéfinis */
}

.message-item:hover {
    background-color: #e9ecef; /* Couleur de fond au survol des messages prédéfinis */
}

.predefined-messages {
    max-height: 300px; /* Hauteur maximale pour la liste des messages prédéfinis avec défilement si nécessaire */
    overflow-y: auto; /* Activation du défilement vertical si la liste dépasse la hauteur maximale */
}

/* Style pour le formulaire de message personnalisé */
.custom-message-form {
    margin-top: 20px;
}

.custom-message-form textarea {
    resize: vertical; /* Redimensionnement vertical activé pour le textarea */
}
</style>