<?php 
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Rapport;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index()
    {
        $rapports = Rapport::all();
        return view('admin.manage-rapports', compact('rapports'));
    }

    public function create()
    {
        return view('admin.rapports.create');
    }

    public function store(Request $request)
    {
        $rapport = new Rapport;
        $rapport->title = $request->title;
        $rapport->description = $request->description;
        $rapport->save();

        return redirect()->route('admin.manage-rapports')->with('success', 'Rapport créé avec succès');
    }

    public function show(Rapport $rapport)
    {
        return view('admin.show-rapport', compact('rapport'));
    }

    public function edit(Rapport $rapport)
    {
        return view('admin.rapports.edit', compact('rapport'));
    }

    public function update(Request $request, Rapport $rapport)
    {
        $rapport->title = $request->title;
        $rapport->description = $request->description;
        $rapport->save();

        return redirect()->route('manage-rapports')->with('success', 'Rapport mis à jour avec succès');
    }

    public function destroy(Rapport $rapport)
    {
        $rapport->delete();

        return redirect()->route('manage-rapports')->with('success', 'Rapport supprimé avec succès');
    }
}
