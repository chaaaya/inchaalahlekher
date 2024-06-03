<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vol;
use Illuminate\Http\Request;

class VolController extends Controller
{
    public function index()
    {
        $vols = Vol::all();
        return view('admin.vols.index', compact('vols'));
    }

    public function create()
    {
        return view('admin.vols.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_vol' => 'required|string|max:255',
            'heure_depart' => 'required|date',
            'heure_arrivee' => 'required|date',
        ]);

        Vol::create([
            'numero_vol' => $request->numero_vol,
            'heure_depart' => $request->heure_depart,
            'heure_arrivee' => $request->heure_arrivee,
        ]);

        return redirect()->route('admin.vols.index')
                         ->with('success', 'Vol créé avec succès.');
    }

    public function edit(Vol $vol)
    {
        return view('admin.vols.edit', compact('vol'));
    }

    public function update(Request $request, Vol $vol)
    {
        $request->validate([
            'numero_vol' => 'required|string|max:255',
            'heure_depart' => 'required|date',
            'heure_arrivee' => 'required|date',
        ]);

        $vol->update([
            'numero_vol' => $request->numero_vol,
            'heure_depart' => $request->heure_depart,
            'heure_arrivee' => $request->heure_arrivee,
        ]);

        return redirect()->route('admin.vols.index')
                         ->with('success', 'Vol mis à jour avec succès.');
    }

    public function destroy(Vol $vol)
    {
        $vol->delete();

        return redirect()->route('admin.vols.index')
                         ->with('success', 'Vol supprimé avec succès.');
    }
}
