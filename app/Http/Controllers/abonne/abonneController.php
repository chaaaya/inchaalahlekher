<?php

namespace App\Http\Controllers\abonne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Offer;
use App\Models\Client;

class AbonneController extends Controller
{
    public function index()
    {
        return view('client.abonne.index');
    }


    public function historiqueVols()
    {
        // Si vous ne souhaitez pas filtrer par client_id, récupérez simplement tous les vols
        $vols = Vol::all();
        return view('client.abonne.historique_vols', ['vols' => $vols]);
    }

    public function servicesSupplementaires()
    {
        return view('client.abonne.services_supplementaires');
    }

    public function consulterOffres()
    {
        $offers = Offer::all();
        return view('client.abonne.offres', ['offers' => $offers]);
    }

    public function suivreVols()
    {
        $vols = Vol::all();
        return view('client.abonne.suivre_vols', ['vols' => $vols]);
    }

    public function __construct()
    {
        $this->middleware('auth:client');
    }
    
    public function showProfile()
    {
        $client = Auth::guard('client')->user(); // Récupérer le client connecté
        return view('client.abonne.profil', compact('client'));
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
            return redirect()->route('abonne.profil')->with('error', 'Erreur lors de la récupération du client');
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
    
        return redirect()->route('abonne.profil')->with('success', 'Profil mis à jour avec succès.');
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
    
        return view('client.abonne.notifications', compact('messages'));
    }
}

