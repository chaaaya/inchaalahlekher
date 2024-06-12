<?php
namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use App\Models\Vol; // Importer le modèle Vol
use Illuminate\Http\Request;

class AbonneController extends Controller
{
    public function index()
    {
        return view('client.abonne.index');
    }

    public function servicesSupplementaires()
    {
        return view('client.abonne.services_supplementaires');
    }

    public function reserverVol()
    {
        $vols = Vol::all();
        return view('client.abonne.reserver_vol', compact('vols'));
    }

    public function historiqueVols()
    {
        return view('client.abonne.historique_vols');
    }

    public function consulterOffres()
    {
        return view('client.abonne.consulter_offres');
    }

    public function suivreVols()
    {
        $volsASuivre = Vol::where('status', 'en cours')->get(); // Exemple de condition pour récupérer les vols à suivre
        return view('client.abonne.suivre_vols', compact('volsASuivre'));
    }

    public function processReservation(Request $request)
    {
        // Logique de traitement de la réservation
    }
    public function showSubscriptionForm()
{
    return view('client.abonne.sabonner'); // Assurez-vous que le nom est correct
}

}
