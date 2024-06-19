<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class Vol1Controller extends Controller
{
    // Afficher tous les vols
    public function index()
    {
        $vols = Vol::all();
        return view('client.abonne.reserver.reserver_vol', compact('vols'));
    }

    public function reserverVol(Request $request)
    {
        // Récupérer les données de recherche
        $ville_depart = $request->input('ville_depart');
        $ville_arrivee = $request->input('ville_arrivee');
    
        // Effectuer la recherche basée sur les villes de départ et d'arrivée
        $vols = Vol::where('ville_depart', 'LIKE', "%$ville_depart%")
                    ->where('ville_arrivee', 'LIKE', "%$ville_arrivee%")
                    ->get();
    
        // Indiquer s'il y a des résultats de recherche
        $hasSearchResults = !$vols->isEmpty();
    
        // Rediriger avec un message d'erreur si aucun vol n'est trouvé
        if (!$hasSearchResults) {
            return redirect()->route('abonne.vols.index')->with('error', 'Aucun vol trouvé.');
        }
    
        // Si des vols sont trouvés, afficher la vue avec les résultats
        return view('client.abonne.reserver.reserver_vol', compact('vols', 'ville_depart', 'ville_arrivee', 'hasSearchResults'));
    }
    // Recherche de vols
    public function rechercher(Request $request)
    {
        $ville_depart = $request->input('ville_depart');
        $ville_arrivee = $request->input('ville_arrivee');

        $vols = Vol::where('ville_depart', 'LIKE', "%$ville_depart%")
                    ->where('ville_arrivee', 'LIKE', "%$ville_arrivee%")
                    ->get();

        $hasSearchResults = !$vols->isEmpty();

        return view('client.abonne.reserver.reserver_vol', compact('vols', 'ville_depart', 'ville_arrivee', 'hasSearchResults'));
    }

    // Afficher le formulaire de réservation pour un vol spécifique
    public function howReservationDetails($vol_id, $reservation_id)
    {
        // Récupérer la réservation et le vol correspondants
        $reservation = Reservation::findOrFail($reservation_id);
        $vol = Vol::findOrFail($vol_id);
    
        // Vérifier si la réservation et le vol correspondent
        if ($reservation->vol_id != $vol->id) {
            // Gérer le cas où la réservation et le vol ne correspondent pas
            return redirect()->route('abonne.vols.index')->with('error', 'La réservation et le vol ne correspondent pas.');
        }
    
        // Rediriger vers la vue de confirmation avec les détails de la réservation
        return view('client.abonne.reserver.confirmation_reservation', compact('reservation', 'vol'));
    }
    

    // Traiter la réservation
    public function processReservation(Request $request)
    {
        // Valider les données soumises par le formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|regex:/\d{2}\/\d{2}\/\d{4}/',
            'sexe' => 'required|in:Homme,Femme',
            'nationalite' => 'required|string|max:255',
            'num_identite' => 'required|string|max:255',
            'date_expiration_identite' => 'required|date',
            'pays_delivrance_identite' => 'required|string|max:255',
            'date_depart' => 'required|date',
            'date_retour' => 'nullable|date|after_or_equal:date_depart',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
            'num_carte' => 'required|string|max:255',
            'date_expiration_carte' => 'required|date',
            'cvv' => 'required|string|max:10',
            'nom_titulaire_carte' => 'required|string|max:255',
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'vol_id' => 'required|exists:vols,id', // Assurez-vous que vol_id existe dans la table vols
        ]);

        // Convertir la date de naissance en format Y-m-d si nécessaire
        $dateNaissanceParts = explode('/', $validatedData['date_naissance']);
        $validatedData['date_naissance'] = $dateNaissanceParts[2] . '-' . $dateNaissanceParts[1] . '-' . $dateNaissanceParts[0];

        // Associer la réservation au client authentifié
        $client = Auth::guard('client')->user();

        if (!$client) {
            abort(403, 'Unauthorized action.'); // Gérer le cas où le client n'est pas trouvé
        }

        // Ajouter client_id aux données validées
        $validatedData['client_id'] = $client->id;

        // Créer et enregistrer la réservation dans la base de données
        $reservation = Reservation::create($validatedData);

        // Rediriger vers la vue de confirmation avec les détails de la réservation
        return redirect()->route('abonne.reservation.details', ['reservation_id' => $reservation->id]);
    }
    public function showReservationForm($vol_id)
    {
        // Récupérer le vol spécifique par $vol_id
        $vol = Vol::findOrFail($vol_id);
    
        // Retourner la vue du formulaire de réservation avec les données du vol
        return view('client.abonne.reserver.reservation_form', compact('vol'));
    }
    

    // Afficher les détails de la réservation

}

