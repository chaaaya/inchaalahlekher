@extends('layouts.admin')

@section('content')
    <div class="container py-4">
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
                            <div class="form-group">
                                <label for="message">Message personnalisé</label>
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Écrivez votre message ici..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                        
                    </div>
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