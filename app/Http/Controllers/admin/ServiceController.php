<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Location;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Affiche la vue avec les hôtels et les locations
    public function index()
    {
        $hotels = Hotel::all();
        $locations = Location::all();

        return view('admin.services.index', compact('hotels', 'locations'));
    }

    // Affiche le formulaire de création d'un nouvel hôtel
    public function createHotel()
    {
        return view('admin.hotels.create');
    }

    // Enregistre un nouvel hôtel
    public function storeHotel(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'nullable|string|max:255',
        ]);

        Hotel::create($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Hôtel créé avec succès.');
    }

    // Affiche le formulaire d'édition d'un hôtel
    public function editHotel($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.hotels.edit', compact('hotel'));
    }

    // Met à jour un hôtel existant
    public function updateHotel(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'nullable|string|max:255',
        ]);

        $hotel->update($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Hôtel mis à jour avec succès.');
    }

    // Supprime un hôtel
    public function destroyHotel($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect()->route('admin.services.index')->with('success', 'Hôtel supprimé avec succès.');
    }

    // Affiche le formulaire de création d'une nouvelle location
    public function create()
    {
        return view('admin.locations.create');
    }

    // Enregistre une nouvelle location
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'nullable|string|max:255',
        ]);

        Location::create($validatedData);

        return redirect()->route('admin.locations.index')->with('success', 'Location créée avec succès.');
    }

    // Affiche le formulaire d'édition d'une location
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.locations.edit', compact('location'));
    }

    // Met à jour une location existante
    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'nullable|string|max:255',
        ]);

        $location->update($validatedData);

        return redirect()->route('admin.locations.index')->with('success', 'Location mise à jour avec succès.');
    }

    // Supprime une location
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('admin.locations.index')->with('success', 'Location supprimée avec succès.');
    }
}
