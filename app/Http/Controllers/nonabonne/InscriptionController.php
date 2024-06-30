<?php
namespace App\Http\Controllers\nonabonne;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use TCPDF;

class InscriptionController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        // Récupération de l'ID du client connecté
        $clientId = Auth::guard('client')->id();

        // Recherche du client dans la base de données
        $client = Client::find($clientId);

        if (!$client) {
            return redirect()->route('nonabonne.index')->with('error', 'Erreur lors de la récupération du client');
        }

        // Passage des données du client à la vue
        return view('client.nonabonne.sabonner.sabonner', [
            'client' => $client,
        ]);
    }

    /**
     * Soumet le formulaire d'inscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        // Récupération de l'ID du client connecté
        $clientId = Auth::guard('client')->id();

        // Création d'un nouveau client ou mise à jour s'il existe déjà
        $client = Client::findOrNew($clientId);

        // Attribution des valeurs aux propriétés du client
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

        // Vérification si c'est un nouveau client ou une mise à jour
        if (!$client->exists || $client->subscription_status != 'pending1') {
            // Nouveau client ou client avec un statut différent de pending1
            $client->subscription_status = 'pending1';
        }

        // Sauvegarde des modifications du client
        $client->save();

        // Redirection vers la page de confirmation avec les données du client
        return redirect()->route('nonabonne.inscription.confirmation', ['client' => $client]);
    }

    /**
     * Affiche la page de confirmation d'inscription.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\View\View
     */
    public function showConfirmation(Client $client)
    {
        return view('client.nonabonne.sabonner.confirmation', [
            'client' => $client,
        ]);
    }

    /**
     * Génère et télécharge le PDF de confirmation d'inscription.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    

    // ...
    
    public function downloadConfirmation(Client $client)
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
        $pdf->AddPage();
        $pdf->SetFont('Helvetica', '', 10);
    
        $html = view('client.nonabonne.sabonner.download', ['client' => $client])->render();
        $pdf->writeHTML($html, true, false, true, false, '');
    
        $pdf->Output('confirmation_inscription.pdf', 'D');
    }
 
public function generatePDF($client_id)
{
    $client = Client::findOrFail($client_id);

    // Load HTML template
    $html = view('client.pdf_template', compact('client'))->render();

    // Configure Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);

    // (Optional) Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to browser
    return $dompdf->stream('inscription.pdf');
}

}
