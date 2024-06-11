<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all(); // Récupérer toutes les locations de voitures depuis le modèle

        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'nullable|string|max:255',
        ]);

        // Création d'une nouvelle location de voiture dans la base de données
        Location::create($validatedData);

        return redirect()->route('admin.locations.index')->with('success', 'Location de voiture ajoutée avec succès.');
    }

    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'nullable|string|max:255',
        ]);

        // Mise à jour des détails de la location de voiture dans la base de données
        $location->update($validatedData);

        return redirect()->route('admin.locations.index')->with('success', 'Détails de la location de voiture mis à jour avec succès.');
    }

    public function destroy(Location $location)
    {
        // Suppression de la location de voiture dans la base de données
        $location->delete();

        return redirect()->route('admin.locations.index')->with('success', 'Location de voiture supprimée avec succès.');
    }
}
