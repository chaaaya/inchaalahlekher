@extends('layouts.respo')

@section('title', 'Communiquer avec les Parties Prenantes')

@section('styles')
    <style>
        .section-container {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
@endsection

@section('content-respo')

<div class="section-container">
    <h2><a href="{{ route('respo.stakeholders.index') }}">Liste des Parties Prenantes</a></h2>
    <ul>
        @foreach($stakeholders as $stakeholder)
            <li>
                <a href="{{ route('respo.stakeholders.show', $stakeholder->id) }}">
                    {{ $stakeholder->name }} - {{ $stakeholder->role }} - {{ $stakeholder->email }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

<div class="section-container">
    <h2>Envoyer un Message</h2>
    <form action="{{ route('respo.communicate.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="recipient">Destinataire</label>
            <select class="form-control" id="recipient" name="recipient" required>
                @foreach($stakeholders as $stakeholder)
                    <option value="{{ $stakeholder->email }}">{{ $stakeholder->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<div class="section-container">
    <h2>Historique des Communications</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Destinataire</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($communications as $communication)
                <tr>
                    <td>{{ $communication->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $communication->recipient }}</td>
                    <td>{{ $communication->message }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="section-container">
    <h2>Documents Partagés</h2>
    <form action="{{ route('respo.communicate.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="document">Télécharger un Document</label>
            <input type="file" class="form-control" id="document" name="document" required>
        </div>
        <button type="submit" class="btn btn-primary">Télécharger</button>
    </form>

    <h3>Documents</h3>
    <ul>
        @foreach($documents as $document)
            <li>
                <a href="{{ asset('storage/' . $document->path) }}" target="_blank">{{ $document->name }}</a>
                <form action="{{ route('respo.communicate.delete', $document->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce document ?')">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

@endsection
