<?php
namespace App\Http\Controllers\Respo;

use App\Http\Controllers\Controller;
use App\Models\ContinuityPlan;
use Illuminate\Http\Request;

class ContinuityPlansController extends Controller
{
    public function index()
    {
        $plans = ContinuityPlan::orderBy('created_at', 'desc')->get();
        return view('respo.continuity-plans.index', ['plans' => $plans]);
    }

    public function create()
    {
        return view('respo.continuity-plans.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        ContinuityPlan::create($validatedData);
    
        return redirect()->route('respo.continuity-plans.index')
                         ->with('success', 'Plan de continuité créé avec succès.');
    }
    

    public function show($id)
    {
        $plan = ContinuityPlan::findOrFail($id);
        return view('respo.continuity-plans.show', ['plan' => $plan]);
    }

    public function edit($id)
    {
        $plan = ContinuityPlan::findOrFail($id);
        return view('respo.continuity-plans.edit', ['plan' => $plan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $plan = ContinuityPlan::findOrFail($id);
        $plan->update($request->all());

        return redirect()->route('respo.continuity-plans.index')
                         ->with('success', 'Plan de continuité mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $plan = ContinuityPlan::findOrFail($id);
        $plan->delete();

        return redirect()->route('respo.continuity-plans.index')
                         ->with('success', 'Plan de continuité supprimé avec succès.');
    }
}
