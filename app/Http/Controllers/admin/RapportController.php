<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rapport;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index()
    {
        $rapports = Rapport::all();
        return view('admin.rapports.index', compact('rapports'));
    }

    public function create()
    {
        return view('admin.rapports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $rapport = new Rapport();
        $rapport->title = $request->title;
        $rapport->description = $request->description;
        $rapport->save();

        return redirect()->route('admin.rapports.index')->with('success', 'Rapport créé avec succès.');
    }

    public function show(Rapport $rapport)
    {
        return view('admin.rapports.show', compact('rapport'));
    }

    public function edit(Rapport $rapport)
    {
        return view('admin.rapports.edit', compact('rapport'));
    }

    public function update(Request $request, Rapport $rapport)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $rapport->title = $request->title;
        $rapport->description = $request->description;
        $rapport->save();

        return redirect()->route('admin.rapports.index')->with('success', 'Rapport mis à jour avec succès.');
    }

    public function destroy(Rapport $rapport)
    {
        $rapport->delete();

        return redirect()->route('admin.rapports.index')->with('success', 'Rapport supprimé avec succès.');
    }
}
