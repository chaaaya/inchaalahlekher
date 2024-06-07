<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Exclure les utilisateurs avec les rôles "admin" et "respo"
        $users = User::whereNotIn('role', ['admin', 'respo'])->get();
        
        return view('admin.users.manage-users', compact('users'));
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Création d'un nouvel utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirection avec un message de succès
        return redirect()->route('admin.users.create')->with('success', 'Utilisateur créé avec succès.');
    }
    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password ? bcrypt($request->password) : $user->password,
    ]);

    return redirect()->route('admin.users.manage-users')->with('success', 'Utilisateur mis à jour avec succès.');
}
public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('admin.users.manage-users')->with('success', 'Utilisateur supprimé avec succès.');
}


    // Les autres méthodes comme edit, update, destroy doivent être définies comme vous l'avez déjà fait
}
