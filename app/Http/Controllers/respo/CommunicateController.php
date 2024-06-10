<?php
namespace App\Http\Controllers\Respo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stakeholder;
use App\Models\Communication;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class CommunicateController extends Controller
{
    public function index()
    {
        $stakeholders = Stakeholder::all();
        $communications = Communication::all();
        $documents = Document::all();

        return view('respo.communicate.index', compact('stakeholders', 'communications', 'documents'));
    }

    public function send(Request $request)
    {
        $communication = new Communication();
        $communication->recipient = $request->recipient;
        $communication->message = $request->message;
        $communication->save();

        return redirect()->route('respo.communicate.index')->with('success', 'Message envoyé avec succès.');
    }

    public function upload(Request $request)
    {
        $document = new Document();
        if ($request->hasFile('document')) {
            $path = $request->file('document')->store('documents', 'public');
            $document->name = $request->file('document')->getClientOriginalName();
            $document->path = $path;
            $document->save();
        }

        return redirect()->route('respo.communicate.index')->with('success', 'Document téléchargé avec succès.');
    }
    public function deleteDocument($id)
    {
        $document = Document::findOrFail($id);
        // Supprimez le fichier du stockage si nécessaire
        // Storage::delete($document->path);
        $document->delete();

        return back()->with('success', 'Document supprimé avec succès.');
    }
}
