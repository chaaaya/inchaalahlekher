<?php
namespace App\Http\Controllers\Respo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController2 extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
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
            'numero_telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = new User([
            'name' => $request->name,
            'numero_telephone' => $request->numero_telephone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);
        $user->save();

        return redirect()->route('respo.admins.index')
                         ->with('success', 'Administrateur créé avec succès.');
    }

    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('respo.admins.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('respo.admins.edit', compact('admin'));
    }

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

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('respo.admins.index')
                         ->with('success', 'Administrateur supprimé avec succès.');
    }
}
?>
