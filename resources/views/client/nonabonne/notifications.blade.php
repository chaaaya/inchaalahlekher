@extends('layouts.nonabonne')

@section('content-nonabonne')
    <div class>
        <h1>Notifications</h1>
            <table style="width: 5OOpx;">
                <thead>
                    <tr>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr>
                            <td>{{ $message->content }}</td>
                            <td>{{ $message->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="no-notifications">Aucun message pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
@endsection

<style>
       
</style>