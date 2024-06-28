<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Affiche la liste des utilisateurs avec abonnement en attente.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $clients = Client::all(); // Récupère tous les clients pour la gestion générale
        $clientsPendingSubscription = Client::where('subscription_status', 'pending')->get();

        return view('admin.users.manage-users', compact('clients', 'clientsPendingSubscription'));
    }

    /**
     * Affiche le formulaire d'édition d'un client.
     *
     * @param  Client  $user
     * @return \Illuminate\View\View
     */
    public function edit(Client $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Met à jour les informations d'un client.
     *
     * @param  Request  $request
     * @param  Client  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Client $user)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'numero_telephone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Mise à jour des propriétés du client
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->numero_telephone = $request->input('numero_telephone');
        
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('admin.manage-users')->with('success', 'Client mis à jour avec succès.');
    }

    /**
     * Supprime un client.
     *
     * @param  Client  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Client $user)
    {
        $user->delete();

        Log::info('Client supprimé: ' . $user->id);

        return redirect()->route('admin.manage-users')->with('success', 'Client supprimé avec succès.');
    }

    /**
     * Crée un nouveau client.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:clients',
        'numero_telephone' => 'required|string|max:20',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Création d'un nouveau client avec abonnement en attente (pending subscription)
    $newClient = new Client();
    $newClient->name = $request->input('name');
    $newClient->email = $request->input('email');
    $newClient->numero_telephone = $request->input('numero_telephone');
    $newClient->password = bcrypt($request->input('password'));
    $newClient->subscription_status = 'rejected'; // Définition de l'état d'abonnement en attente
    $newClient->save();

    Log::info('Nouveau client créé: ' . $newClient->id);

    return redirect()->route('admin.manage-users')->with('success', 'Nouveau client créé avec succès.');
}


    /**
     * Accepte l'abonnement d'un client.
     *
     * @param  Client  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function acceptSubscription(Client $user)
    {
        $user->subscription_status = 'accepted';
        $user->save();

        Log::info('Abonnement accepté pour le client: ' . $user->id);

        return redirect()->route('admin.manage-users')->with('success', 'Abonnement accepté avec succès pour le client.');
    }

    /**
     * Refuse l'abonnement d'un client.
     *
     * @param  Client  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rejectSubscription(Client $user)
    {
        $user->subscription_status = 'rejected';
        $user->save();

        Log::info('Abonnement refusé pour le client: ' . $user->id);

        return redirect()->route('admin.manage-users')->with('success', 'Abonnement refusé avec succès pour le client.');
    }
}
