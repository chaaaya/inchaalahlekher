<?php

namespace App\Http\Controllers\Respo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController2 extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('respo.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('respo.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8',
            'numero_telephone' => 'nullable|string', // Ajoutez cette ligne si le numéro de téléphone est facultatif
        ]);
        

        $admin = new Admin([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'numero_telephone' => $request->numero_telephone, // Assurez-vous que vous avez cette ligne
        ]);
        $admin->save();
        return redirect()->route('respo.admins.index')
                         ->with('success', 'Administrateur créé avec succès.');
    }

 

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('respo.admins.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('respo.admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Vérifiez si un nouveau mot de passe est soumis
        if ($request->has('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect()->route('respo.admins.index')
                         ->with('success', 'Administrateur mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('respo.admins.index')
                         ->with('success', 'Administrateur supprimé avec succès.');
    }
}

?>
