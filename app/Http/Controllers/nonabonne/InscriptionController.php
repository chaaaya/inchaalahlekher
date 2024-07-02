<?php
namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Carbon\Carbon;
use TCPDF;

class InscriptionController extends Controller
{
    public function showForm()
    {
        $clientId = Auth::guard('client')->id();
        $client = Client::find($clientId);

        if (!$client) {
            return redirect()->route('nonabonne.index')->with('error', 'Erreur lors de la récupération du client');
        }

        // Rediriger vers la page de succès si l'abonnement est déjà accepté
        if ($client->subscription_status == 'accepted') {
            return redirect()->route('nonabonne.success');
        }

        // Rediriger vers la page de confirmation si le formulaire est déjà rempli
        if ($client->has_completed_subscription_form) {
            return redirect()->route('nonabonne.inscription.confirmation', $client);
        }

        // Passage des données du client à la vue
        return view('client.nonabonne.sabonner.sabonner', [
            'client' => $client,
        ]);
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_naissance' => 'required|date_format:d/m/Y',
            'sexe' => 'required|in:homme,femme,autre',
            'nationalite' => 'required|string|max:255',
            'numero_identite' => 'required|string|max:255',
            'expiration_identite' => 'required|date_format:d/m/Y',
            'email' => 'required|email|max:255',
            'numero_telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'numero_carte_credit' => 'required|string|max:20',
            'expiration_carte_credit' => 'required|date_format:d/m/Y',
            'cvv' => 'required|string|max:4',
            'titulaire_carte' => 'required|string|max:255',
        ]);

        $clientId = Auth::guard('client')->id();
        $client = Client::find($clientId);

        if (!$client) {
            return redirect()->back()->with('error', 'Client non trouvé');
        }

        $client->name = $request->input('name');
        $client->date_naissance = Carbon::createFromFormat('d/m/Y', $request->input('date_naissance'))->format('Y-m-d');
        $client->sexe = $request->input('sexe');
        $client->nationalite = $request->input('nationalite');
        $client->numero_identite = $request->input('numero_identite');
        $client->expiration_identite = Carbon::createFromFormat('d/m/Y', $request->input('expiration_identite'))->format('Y-m-d');
        $client->email = $request->input('email');
        $client->numero_telephone = $request->input('numero_telephone');
        $client->adresse = $request->input('adresse');
        $client->numero_carte_credit = $request->input('numero_carte_credit');
        $client->expiration_carte_credit = Carbon::createFromFormat('d/m/Y', $request->input('expiration_carte_credit'))->format('Y-m-d');
        $client->cvv = $request->input('cvv');
        $client->titulaire_carte = $request->input('titulaire_carte');
        $client->subscription_status = 'pending1';
        $client->save();

        return redirect()->route('nonabonne.inscription.confirmation', $client->id);
    }

    public function showConfirmation($clientId)
    {
        $client = Client::find($clientId);
        return view('client.nonabonne.sabonner.confirmation', [
            'client' => $client,
        ]);
    }

    public function downloadConfirmation($clientId)
    {
        $client = Client::find($clientId);

        // Mettre à jour la colonne has_completed_subscription_form
        $client->has_completed_subscription_form = 1;
        $client->save();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->AddPage();
        $pdf->SetFont('Helvetica', '', 10);
        $html = view('client.nonabonne.sabonner.download', ['client' => $client])->render();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('confirmation_inscription.pdf', 'D');
    }

    public function showSuccess()
    {
        return view('client.nonabonne.sabonner.success');
    }
}
