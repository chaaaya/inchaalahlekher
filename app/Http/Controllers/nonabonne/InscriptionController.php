<?php

namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Carbon\Carbon;

class InscriptionController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        // Récupération de l'ID du client connecté
        $clientId = Auth::guard('client')->id();

        // Recherche du client dans la base de données
        $client = Client::find($clientId);

        if (!$client) {
            return redirect()->route('nonabonne.index')->with('error', 'Erreur lors de la récupération du client');
        }

        // Passage des données du client à la vue
        return view('client.nonabonne.sabonner.sabonner', [
            'client' => $client,
        ]);
    }

    /**
     * Soumet le formulaire d'inscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitForm(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'date_naissance' => 'required|date_format:d/m/Y',
            'sexe' => 'required|in:homme,femme,autre',
            'nationalite' => 'required|string|max:255',
            'numero_identite' => 'required|string|max:255',
            'expiration_identite' => 'required|date_format:d/m/Y',
            'email' => 'required|email|max:255',
            'numero_telephone' => 'required|string|max:20',
            'numero_carte_credit' => 'required|string|max:20',
            'expiration_carte_credit' => 'required|date_format:d/m/Y',
            'cvv' => 'required|string|max:4',
            'titulaire_carte' => 'required|string|max:255',
            'adresse' => 'required|string',
            'subscription_status' => 'nullable|in:accepted,rejected,pending', // Utilisation de enum au lieu de boolean
        ]);

        // Récupération de l'ID du client connecté
        $clientId = Auth::guard('client')->id();

        if (!$clientId) {
            return redirect()->route('nonabonne.index')->with('error', 'Erreur lors de la récupération du client connecté');
        }

        // Recherche du client dans la base de données
        $client = Client::find($clientId);

        if (!$client) {
            return redirect()->route('nonabonne.index')->with('error', 'Erreur lors de la récupération du client');
        }

        // Attribution des valeurs aux propriétés du client
        $client->name = $request->input('name');
        $client->date_naissance = Carbon::createFromFormat('d/m/Y', $request->input('date_naissance'))->format('Y-m-d');
        $client->sexe = $request->input('sexe');
        $client->nationalite = $request->input('nationalite');
        $client->numero_identite = $request->input('numero_identite');
        $client->expiration_identite = Carbon::createFromFormat('d/m/Y', $request->input('expiration_identite'))->format('Y-m-d');
        $client->email = $request->input('email');
        $client->numero_telephone = $request->input('numero_telephone');
        $client->numero_carte_credit = $request->input('numero_carte_credit');
        $client->expiration_carte_credit = Carbon::createFromFormat('d/m/Y', $request->input('expiration_carte_credit'))->format('Y-m-d');
        $client->cvv = $request->input('cvv');
        $client->titulaire_carte = $request->input('titulaire_carte');
        $client->adresse = $request->input('adresse');
        $client->subscription_status = $request->input('subscription_status'); // Utilisation des valeurs enum

        // Sauvegarde des modifications du client
        $client->save();

        // Redirection vers la page de confirmation
        return redirect()->route('nonabonne.inscription.confirmation');
    }

    /**
     * Affiche la page de confirmation d'inscription.
     *
     * @return \Illuminate\View\View
     */
    public function showConfirmation()
    {
        // Récupération de l'ID du client connecté
        $clientId = Auth::guard('client')->id();

        // Recherche du client dans la base de données
        $client = Client::find($clientId);

        if (!$client) {
            return redirect()->route('nonabonne.index')->with('error', 'Erreur lors de la récupération du client');
        }

        // Passage des données du client à la vue
        return view('client.nonabonne.sabonner.confirmation', [
            'client' => $client,
        ]);
    }
}
