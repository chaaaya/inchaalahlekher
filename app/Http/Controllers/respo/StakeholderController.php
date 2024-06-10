<?php

namespace App\Http\Controllers\Respo;

use App\Http\Controllers\Controller;
use App\Models\Stakeholder;
use Illuminate\Http\Request;

class StakeholderController extends Controller
{
    public function index()
    {
        $stakeholders = Stakeholder::all();
        return view('respo.stakeholders.index', compact('stakeholders'));
    }
    public function create()
    {
        return view('respo.stakeholders.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|unique:stakeholders,email',
        ]);

        $stakeholder = Stakeholder::create($validatedData);

        return redirect()->route('respo.stakeholders.index')
                         ->with('success', 'Stakeholder ajouté avec succès');
    }
    public function show($id)
    {
        $stakeholder = Stakeholder::findOrFail($id);
        return view('respo.stakeholders.show', compact('stakeholder'));
    }

    public function edit($id)
    {
        $stakeholder = Stakeholder::findOrFail($id);
        return view('respo.stakeholders.edit', compact('stakeholder'));
    }
    public function update(Request $request, Stakeholder $stakeholder)
    {
        // Validez les données reçues du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|unique:stakeholders,email,'.$stakeholder->id,
        ]);

        // Mettez à jour le stakeholder avec les données validées
        $stakeholder->update($validatedData);

        // Redirigez l'utilisateur vers la vue show du stakeholder mis à jour
        return redirect()->route('respo.stakeholders.show', $stakeholder->id)
                         ->with('success', 'Stakeholder mis à jour avec succès');
    }
    public function destroy(Stakeholder $stakeholder)
    {
        $stakeholder->delete();

        return redirect()->route('respo.stakeholders.index')
                         ->with('success', 'Stakeholder supprimé avec succès');
    }
}
