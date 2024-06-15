<?php
namespace App\Http\Controllers\Respo;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            'email' => 'required|string|email|max:255|unique:admins',
            'numero_telephone' => 'required|string|max:15',
        ]);

        Admin::create($request->all());

        return redirect()->route('respo.admins.index')->with('success', 'Administrateur ajouté avec succès.');
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
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'numero_telephone' => 'required|string|max:15',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update($request->all());

        return redirect()->route('respo.admins.index')->with('success', 'Administrateur mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('respo.admins.index')->with('success', 'Administrateur supprimé avec succès.');
    }
}
