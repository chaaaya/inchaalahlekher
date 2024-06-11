<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all(); // Récupérer tous les hôtels depuis le modèle

        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('admin.hotels.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'nullable|string|max:255',
        ]);

        // Création d'un nouvel hôtel dans la base de données
        Hotel::create($validatedData);

        return redirect()->route('admin.hotels.index')->with('success', 'Hôtel ajouté avec succès.');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $hotel)
    {
        // Trouver l'hôtel par son ID
        $hotel = Hotel::findOrFail($hotel);
    
        // Mettre à jour les attributs de l'hôtel
        $hotel->nom = $request->input('nom');
        $hotel->description = $request->input('description');
        $hotel->adresse = $request->input('adresse');
        // Ajoutez plus de champs au besoin
    
        // Enregistrer l'hôtel mis à jour
        $hotel->save();
    
        // Redirection avec un message de succès
        return redirect()->route('admin.hotels.index')->with('success', 'Hôtel mis à jour avec succès.');
    }
    
    public function destroy(Hotel $hotel)
    {
        // Suppression de l'hôtel dans la base de données
        $hotel->delete();

        return redirect()->route('admin.hotels.index')->with('success', 'Hôtel supprimé avec succès.');
    }
}
