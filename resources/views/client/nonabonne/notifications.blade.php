@extends('layouts.nonabonne')

@section('content-nonabonne')
    <h1>Notifications</h1>

    @forelse ($client->notifications as $notification)
        <div class="notification">
            <p>{{ $notification->data['message'] }}</p>
            <small>{{ $notification->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p>Aucune notification pour le moment.</p>
    @endforelse
@endsection
