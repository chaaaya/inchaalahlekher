<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Notification;
use App\Notifications\SubscriptionAcceptedNotification;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Message;

class UserController extends Controller
{
    protected $predefinedMessages = [
        "Votre abonnement a été accepté avec succès. Merci pour votre confiance.",
        "Votre abonnement a été refusé. Veuillez nous contacter pour plus de détails.",
        "Votre réservation a été acceptée. Merci pour votre confiance.",
        "Votre réservation a été refusée. Veuillez nous contacter pour plus de détails.",
    ];

    public function index()
    {
        $clients = Client::all();
        $clientsPendingApproval = Client::where('subscription_status', 'pending')->get();

        return view('admin.users.manage-users', compact('clients', 'clientsPendingApproval'));
    }

    public function edit(Client $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, Client $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'numero_telephone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->numero_telephone = $request->input('numero_telephone');
        
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('admin.manage-users')->with('success', 'Client mis à jour avec succès.');
    }

    public function destroy(Client $user)
    {
        $user->delete();

        Log::info('Client supprimé: ' . $user->id);

        return redirect()->route('admin.manage-users')->with('success', 'Client supprimé avec succès.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'numero_telephone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $newClient = new Client();
        $newClient->name = $request->input('name');
        $newClient->email = $request->input('email');
        $newClient->numero_telephone = $request->input('numero_telephone');
        $newClient->password = bcrypt($request->input('password'));
        $newClient->subscription_status = 'pending';
        $newClient->save();

        Log::info('Nouveau client créé: ' . $newClient->id);

        return redirect()->route('admin.manage-users')->with('success', 'Nouveau client créé avec succès.');
    }

    public function acceptSubscription(Client $user)
    {
        $user->subscription_status = 'accepted';
        $user->save();

        $user->notify(new SubscriptionAcceptedNotification());

        Log::info('Abonnement accepté pour le client: ' . $user->id);

        return redirect()->route('admin.manage-users')->with('success', 'Abonnement accepté avec succès pour le client.');
    }

    public function rejectSubscription(Client $user)
    {
        $user->subscription_status = 'rejected';
        $user->save();

        Log::info('Abonnement refusé pour le client: ' . $user->id);

        return redirect()->route('admin.manage-users')->with('success', 'Abonnement refusé avec succès pour le client.');
    }

    public function showMessageForm(Client $client)
    {
        $predefinedMessages = [
            "Votre abonnement a été accepté avec succès. Merci pour votre confiance.",
            "Votre abonnement a été refusé. Veuillez contacter le support pour plus d'informations.",
            "Votre réservation a été confirmée. Merci pour votre confiance.",
            "Votre réservation a été annulée. Veuillez contacter le support pour plus d'informations."
        ];

        return view('admin.users.create-message', compact('client', 'predefinedMessages'));
    }
    public function sendMessage(Request $request, Client $client)
    {
        if ($request->filled('message')) {
            // Custom message from the form
            $request->validate([
                'message' => 'required|string',
            ]);
            $message = new Message();
            $message->client_id = $client->id;
            $message->content = $request->input('message');
            $message->save();
        } else {
            // Predefined message from the list
            $predefinedMessage = $request->input('predefined_message');
            $message = new Message();
            $message->client_id = $client->id;
            $message->content = $predefinedMessage;
            $message->save();
        }
    
        return redirect()->route('admin.manage-users')->with('success', 'Message envoyé avec succès.');
    }
    
}    