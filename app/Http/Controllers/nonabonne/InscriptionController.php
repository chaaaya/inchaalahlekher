<?php

namespace App\Http\Controllers\NonAbonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;


class InscriptionController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('client.nonabonne.sabonner.sabonner');
    }

    /**
     * Traite la soumission du formulaire d'inscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function submitForm(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email|unique:clients,email',
            'date_naissance' => 'required|date',
            'sexe' => 'required|in:homme,femme',
            'nationalite' => 'required|string',
            'numero_identite' => 'required|string',
            'expiration_identite' => 'required|date',
            'numero_telephone' => 'required|string',
            'numero_carte_credit' => 'required|string',
            'expiration_carte_credit' => 'required|date',
            'cvv' => 'required|string',
            'titulaire_carte' => 'required|string',
            'terms' => 'required|accepted',
            'communications' => 'nullable',
        ]);

        // Récupérer l'utilisateur connecté (client)
        $client = Auth::guard('client')->user();

        if (!$client) {
            return redirect()->route('client.login')->with('error', 'Vous devez être connecté pour effectuer cette action.');
        }

        // Mettre à jour les données du client
        $client->name = $validatedData['nom'];
        $client->email = $validatedData['email'];
        $client->numero_telephone = $validatedData['numero_telephone'];
        $client->date_naissance = $validatedData['date_naissance'];
        $client->sexe = $validatedData['sexe'];
        $client->nationalite = $validatedData['nationalite'];
        $client->numero_identite = $validatedData['numero_identite'];
        $client->expiration_identite = $validatedData['expiration_identite'];
        $client->numero_carte_credit = $validatedData['numero_carte_credit'];
        $client->expiration_carte_credit = $validatedData['expiration_carte_credit'];
        $client->cvv = $validatedData['cvv'];
        $client->titulaire_carte = $validatedData['titulaire_carte'];
        $client->status = 'pending';
        $client->subscription = 0;

        // Sauvegarder les modifications du client
        try {
            $client->save();
        } catch (\Exception $e) {
            dd($e->getMessage()); // Affichez le message d'erreur pour identifier la cause exacte.
        }
        
        // Rediriger ou retourner une vue de confirmation
        return view('client.nonabonne.sabonner.confirmation', compact('client'));
    }
}
