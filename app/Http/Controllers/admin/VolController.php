<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vol;
use Illuminate\Http\Request;

class VolController extends Controller
{
    public function index()
    {
        $vols = Vol::all(); // Récupérer tous les vols depuis le modèle

        return view('admin.vols.index', compact('vols'));
    }

    public function create()
    {
        return view('admin.vols.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'numero_vol' => 'required|string|max:255',
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'heure_depart' => 'required|date',
            'heure_arrivee' => 'required|date|after:heure_depart',
            'compagnie' => 'required|string|max:255',
        ]);

        // Création d'un nouveau vol dans la base de données
        Vol::create($validatedData);

        return redirect()->route('admin.vols.index')->with('success', 'Vol créé avec succès.');
    }

    public function edit($id)
    {
        $vol = Vol::findOrFail($id); // Récupérer le Vol par son ID

        return view('admin.vols.edit', compact('vol'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'numero_vol' => 'required|string|max:255',
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'heure_depart' => 'required|date',
            'heure_arrivee' => 'required|date|after:heure_depart',
            'compagnie' => 'required|string|max:255',
        ]);

        // Mise à jour du vol dans la base de données
        $vol = Vol::findOrFail($id);
        $vol->update($validatedData);

        return redirect()->route('admin.vols.index')->with('success', 'Vol mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $vol = Vol::findOrFail($id);
        $vol->delete();

        return redirect()->route('admin.vols.index')->with('success', 'Vol supprimé avec succès.');
    }
}
