<?php
namespace App\Http\Controllers\Respo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rapport;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $rapports = Rapport::all();
        return view('respo.reports.index', compact('rapports'));
    }

    public function show($id)
    {
        $rapport = Rapport::findOrFail($id);
        return view('respo.reports.show', compact('rapport'));
    }

    public function edit($id)
    {
        $rapport = Rapport::findOrFail($id);
        return view('respo.reports.edit', compact('rapport'));
    }

    public function update(Request $request, $id)
    {
        $rapport = Rapport::findOrFail($id);
        $rapport->update($request->all());

        return redirect()->route('respo.reports.index')->with('success', 'Rapport mis à jour avec succès');
    }

    public function destroy($id)
    {
        $rapport = Rapport::findOrFail($id);
        $rapport->delete();

        return redirect()->route('respo.reports.index')->with('success', 'Rapport supprimé avec succès');
    }
}
