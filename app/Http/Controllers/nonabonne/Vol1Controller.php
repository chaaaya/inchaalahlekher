<?php
namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;


class Vol1Controller extends Controller
{
    // Afficher tous les vols
    public function index()
    {
        $vols = Vol::all();
        return view('client.nonabonne.reserver.reserver_vol', compact('vols'));
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
            return redirect()->route('nonabonne.vols.index')->with('error', 'Aucun vol trouvé.');
        }
    
        // Si des vols sont trouvés, afficher la vue avec les résultats
        return view('client.nonabonne.reserver.reserver_vol', compact('vols', 'ville_depart', 'ville_arrivee', 'hasSearchResults'));
    }

    // Afficher le formulaire de réservation pour un vol spécifique
    public function showReservationForm($vol_id)
    {
        $vol = Vol::findOrFail($vol_id);
        return view('client.nonabonne.reserver.reservation_form', compact('vol'));
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
        return redirect()->route('nonabonne.reservation.details', ['vol' => $validatedData['vol_id'], 'reservation' => $reservation->id]);
    }

    // Afficher les détails de la réservation
    public function showReservationDetails($vol_id, $reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);
        $vol = Vol::findOrFail($vol_id);

        if ($reservation->vol_id != $vol->id) {
            return redirect()->route('nonabonne.vols.index')->with('error', 'La réservation et le vol ne correspondent pas.');
        }

        return view('client.nonabonne.reserver.confirmation_reservation', compact('reservation', 'vol'));
    }
    public function show($id)
    {
        $vol = Vol::findOrFail($id);
        $offers = Offer::all(); // Vous pouvez filtrer les offres disponibles selon vos critères
        return view('vols.show', compact('vol', 'offers'));
    }

    public function calculatePrice(Request $request, $volId)
    {
        $vol = Vol::findOrFail($volId);
        $offer = Offer::find($request->offer_id);

        $initialPrice = $vol->price;
        $finalPrice = $initialPrice;

        if ($offer) {
            if ($offer->percentage_discount) {
                $discountAmount = ($initialPrice * $offer->percentage_discount) / 100;
                $finalPrice = $initialPrice - $discountAmount;
            } elseif ($offer->amount_discount) {
                $finalPrice = $initialPrice - $offer->amount_discount;
            }
        }

        return response()->json(['finalPrice' => $finalPrice]);
    }
}
