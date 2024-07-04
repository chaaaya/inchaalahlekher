<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\vol;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::with('vols')->get();
        $vols = Vol::all();
        return view('admin.offers.index', compact('offers','vols'));
    }

    public function create()
    {
        $vols = Vol::all();
        return view('admin.offers.create', compact('vols'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // 'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vols' => 'array',
            'vols.*' => 'exists:vols,id',
        ]);

        $offer = new Offer;
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->price = $request->price;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $offer->image = $imageName;
        }

        $offer->save();
        $offer->vols()->sync($request->vols);

        return redirect()->route('admin.offers.index')->with('success', 'Offre créée avec succès.');
    }

    public function edit($id)
    {

        $offer = Offer::with('vols')->findOrFail($id);
        $vols = Vol::all();
        return view('admin.offers.edit', compact('offer','vols'));
    }

    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            // 'price' => 'nullable|numeric', // Rend le champ 'price' facultatif et numérique
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vols' => 'array',
            'vols.*' => 'exists:vols,id',
        ]);
        
        $offer->title = $request->title;
        $offer->description = $request->description;
        // $offer->price = $request->price;

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($offer->image && file_exists(public_path('images/'.$offer->image))) {
                unlink(public_path('images/'.$offer->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $offer->image = $imageName;
        }

        $offer->save();
        // Synchroniser les vols associés
        $offer->vols()->sync($request->vols);

        return redirect()->route('admin.offers.index')->with('success', 'Offre mise à jour avec succès.');
    }

    public function destroy(Offer $offer)
    {
        if ($offer->image && file_exists(public_path('images/'.$offer->image))) {
            unlink(public_path('images/'.$offer->image));
        }

        $offer->delete();

        return redirect()->route('admin.offers.index')->with('success', 'Offre supprimée avec succès.');
    }
}
?>