<?php
namespace App\Http\Controllers\Respo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController2 extends Controller
{
    /**
     * Display a listing of admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('respo.admins.index', compact('admins'));
    }
    
    /**
     * Show the form for creating a new admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('respo.admins.create');
    }

    /**
     * Store a newly created admin in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'numero_telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = new User([
            'name' => $request->name,
            'numero_telephone' => $request->numero_telephone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin', // Définir le rôle comme administrateur
        ]);
        $user->save();

        return redirect()->route('respo.admins.index')
                         ->with('success', 'Administrateur créé avec succès.');
    }

    /**
     * Display the specified admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('respo.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('respo.admins.edit', compact('admin'));
    }

    /**
     * Update the specified admin in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'numero_telephone' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email,' . $id,
    ]);

    $admin = User::findOrFail($id);
    $admin->name = $request->name;
    $admin->numero_telephone = $request->numero_telephone;
    $admin->email = $request->email;
    $admin->save();

    return redirect()->route('respo.admins.index')
                     ->with('success', 'Administrateur mis à jour avec succès.');
}

    /**
     * Remove the specified admin from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('respo.admins.index')
                         ->with('success', 'Administrateur supprimé avec succès.');
    }
}
