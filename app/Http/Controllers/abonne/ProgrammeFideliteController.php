<?php
namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Commentaire;
use Illuminate\Http\Request;
class ProgrammeFideliteController extends Controller
{
    /**
     * Affiche la page principale du programme de fidélité.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('client.abonne.programme_fidelite');
    }

    /**
     * Télécharge une attestation pour les salons VIP.
     *
     * @return \Illuminate\Http\Response
     */
    public function telechargerAttestation()
    {
        // Vérification de l'authentification
        if (!Auth::guard('client')->check()) {
            return redirect()->route('login')->withErrors(['Vous devez être connecté pour accéder à cette ressource.']);
        }

        // Récupération des informations du client connecté
        $client = Auth::guard('client')->user();

        // Création d'une instance de Dompdf avec des options
        $options = new Options();
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);

        // Contenu HTML pour l'attestation avec les informations du client
        $html = '
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .header { text-align: center; margin-bottom: 50px; }
                .content { margin: 20px; }
                .footer { position: fixed; bottom: 10px; width: 100%; text-align: center; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>Attestation pour les salons VIP</h1>
            </div>
            <div class="content">
                <p>Nous certifions que <strong>' . htmlspecialchars($client->name, ENT_QUOTES, 'UTF-8') . '</strong> (Email : ' . htmlspecialchars($client->email, ENT_QUOTES, 'UTF-8') . '), titulaire de l\'identifiant ' . htmlspecialchars($client->id, ENT_QUOTES, 'UTF-8') . ', est membre du programme de fidélité et bénéficie d\'un accès aux salons VIP.</p>
                <p>Date de délivrance : ' . date('d/m/Y') . '</p>
            </div>
            <div class="footer">
                <p>Merci de voyager avec nous. Pour plus d\'informations, veuillez nous contacter.</p>
            </div>
        </body>
        </html>';

        // Chargement du contenu HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Rendu du PDF
        $dompdf->render();

        // Téléchargement du fichier PDF
        return $dompdf->stream('attestation_vip.pdf');
    }
    public function storeCommentaire(Request $request)
    {
        // Vérification si l'utilisateur est connecté
        if (!Auth::guard('client')->check()) {
            return redirect()->route('login')->withErrors(['Vous devez être connecté pour ajouter un commentaire.']);
        }
    
        // Récupération de l'identifiant du client connecté
        $clientId = Auth::guard('client')->id();
    
        // Validation des données
        $request->validate([
            'commentaire' => 'required|string|max:1000',
        ]);
    
        // Création du commentaire avec client_id récupéré
        Commentaire::create([
            'client_id' => $clientId,
            'commentaire' => $request->commentaire,
        ]);
    
        // Redirection avec un message de succès
        return redirect()->route('abonne.programme_fidelite.index')->with('success', 'Commentaire ajouté avec succès.');
    }
    
}
