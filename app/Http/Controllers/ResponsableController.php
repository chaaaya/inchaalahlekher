<?php
// app/Http/Controllers/ResponsableController.php
namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function index()
    {
        $responsables = Responsable::all();
        return view('responsables.index', compact('responsables'));
    }

    public function show($id)
    {
        $responsable = Responsable::findOrFail($id);
        return view('responsables.show', compact('responsable'));
    }

    public function create()
    {
        return view('responsables.create');
    }

    public function store(Request $request)
    {
        $responsable = Responsable::create($request->all());
        return redirect()->route('responsables.index');
    }

    public function edit($id)
    {
        $responsable = Responsable::findOrFail($id);
        return view('responsables.edit', compact('responsable'));
    }

    public function update(Request $request, $id)
    {
        $responsable = Responsable::findOrFail($id);
        $responsable->update($request->all());
        return redirect()->route('responsables.index');
    }

    public function destroy($id)
    {
        $responsable = Responsable::findOrFail($id);
        $responsable->delete();
        return redirect()->route('responsables.index');
    }
}
