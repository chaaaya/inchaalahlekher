<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $clients = Client::where('status', 'pending')->get();
        return view('admin.users.manage-users', compact('clients'));
    }
    public function accept(Request $request, Client $client)
    {
        Log::info('Accept method called for client: ' . $client->id);
        $client->status = 'accepted';
        $client->save();
    
        return redirect()->route('admin.users.manage-users')->with('success', 'Client accepté avec succès.');
    }
    
    public function reject(Request $request, Client $client)
    {
        Log::info('Reject method called for client: ' . $client->id);
        $client->status = 'rejected';
        $client->save();
    
        return redirect()->route('admin.users.manage-users')->with('success', 'Client refusé avec succès.');
    }
}    