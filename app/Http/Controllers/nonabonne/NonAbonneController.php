<?php
namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Vol;
use App\Models\Location;
use App\Models\Reservation;
use App\Models\Offer;
use App\Models\Hotel;
use App\Models\Client;
use App\Models\Message;
class nonabonneController extends Controller
{
    public function index()
    {
        return view('client.nonabonne.index');
    }

    public function notifications()
    {
        $client = Auth::guard('client')->user();
        $messages = [];
        if ($client) {
            $messages = $client->messages()->orderBy('created_at', 'desc')->get();
        } else {
            // Gérer le cas où le client n'est pas connecté
        }
    
        return view('client.nonabonne.notifications', compact('messages'));
    }
    public function sabonner()
    {
        return view('client.nonabonne.sabonner');
    }

    public function showAllVols()
    {
        $vols = Vol::all();
        return view('client.nonabonne.reserver.reserver_vol', compact('vols'));
    }

    public function historiqueVols()
    {
        $reservations = Reservation::all();
        return view('client.nonabonne.historique_vols', compact('reservations'));
    }

    public function suivreVols()
    {
        $volsASuivre = [];
        return view('client.nonabonne.suivre_vols', compact('volsASuivre'));
    }

    public function mesReservations()
    {
        $reservations = Reservation::where('user_id', auth()->id())->get();
        return view('client.nonabonne.mes_reservations', compact('reservations'));
    }

    public function showProfile()
    {
        $client = Auth::guard('client')->user(); // Récupérer le client connecté
        return view('client.nonabonne.profil', compact('client'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:10',
            'nationalite' => 'required|string|max:50',
            'email' => 'required|string|email|max:255',
            'numero_telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
        ]);
    
        $clientId = Auth::guard('client')->id();
        $client = Client::find($clientId);
    
        if (!$client) {
            return redirect()->route('nonabonne.profil')->with('error', 'Erreur lors de la récupération du client');
        }
    
        if ($request->hasFile('profile_photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($client->profile_photo) {
                Storage::delete('public/' . $client->profile_photo);
            }
    
            // Enregistrer la nouvelle photo
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $client->profile_photo = $path;
        }
    
        // Mettre à jour les autres informations du profil
        $client->name = $request->name;
        $client->date_naissance = $request->date_naissance;
        $client->sexe = $request->sexe;
        $client->nationalite = $request->nationalite;
        $client->email = $request->email;
        $client->numero_telephone = $request->numero_telephone;
        $client->adresse = $request->adresse;
    
        // Sauvegarder les changements dans la base de données
        $client->save();
    
        return redirect()->route('nonabonne.profil')->with('success', 'Profil mis à jour avec succès.');
    }
    public function checkin()
{
    return view('client.nonabonne.checkin');
}

}