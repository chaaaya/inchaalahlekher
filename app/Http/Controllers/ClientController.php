<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'numero_telephone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Client::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'numero_telephone' => $request->numero_telephone,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client créé avec succès.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $client->id,
            'numero_telephone' => 'required|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $client->update([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'numero_telephone' => $request->numero_telephone,
            'password' => $request->password ? bcrypt($request->password) : $client->password,
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client mis à jour avec succès.');
    }
    public function mesReservations($clientId)
    {
        // Récupérer le client avec ses réservations
        $client = Client::findOrFail($clientId);
        $reservations = $client->reservations;

        // Retourner la vue avec les réservations du client
        return view('client.mes_reservations', compact('reservations'));
    }
    public function downloadSubscriptionForm(Client $client)
    {
        // Générez le contenu du formulaire d'abonnement ici
        $content = "Contenu du formulaire d'abonnement à télécharger";

        // Nom du fichier
        $filename = 'formulaire_abonnement_' . $client->id . '.pdf';

        // En-têtes pour le téléchargement
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        // Retourner la réponse pour télécharger le fichier
        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, $filename, $headers);
    }
}
