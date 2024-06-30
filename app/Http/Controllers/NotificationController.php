<?php

namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class NotificationController extends Controller
{
    public function showNotifications()
    {
        // Récupération de l'ID du client connecté
        $clientId = Auth::guard('client')->id();
        
        // Recherche du client dans la base de données
        $client = Client::find($clientId);

        if (!$client) {
            return redirect()->route('nonabonne.index')->with('error', 'Erreur lors de la récupération du client');
        }

        // Passage des données du client à la vue
        return view('client.nonabonne.notifications', [
            'client' => $client,
        ]);
    }
}
