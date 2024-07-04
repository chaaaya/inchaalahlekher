<?php
namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;

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
                <p>Nous certifions que <strong>' . $client->name . '</strong> (Email : ' . $client->email . '), titulaire de l\'identifiant ' . $client->id . ', est membre du programme de fidélité et bénéficie d\'un accès aux salons VIP.</p>
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

    /**
     * Affiche les récompenses disponibles pour les points accumulés.
     *
     * @return \Illuminate\View\View
     */
    public function recompenses()
    {
        // Logique pour déterminer les récompenses disponibles pour les points accumulés
        $recompenses = [
            [
                'titre' => 'Réduction de 10% sur les vols futurs',
                'description' => 'Utilisez vos points pour obtenir une réduction de 10% sur les vols futurs.'
            ],
            [
                'titre' => 'Surclassement gratuit sur les vols',
                'description' => 'Échangez vos points pour bénéficier d\'un surclassement gratuit sur les vols.'
            ],
            [
                'titre' => 'Accès à des offres spéciales et exclusives',
                'description' => 'Accédez à des offres spéciales et exclusives réservées aux membres du programme de fidélité.'
            ],
        ];

        return view('abonne.programme_fidelite.recompenses', [
            'recompenses' => $recompenses,
        ]);
    }

    /**
     * Affiche les avantages exclusifs pour les membres du programme de fidélité.
     *
     * @return \Illuminate\View\View
     */
    public function avantagesExclusifs()
    {
        // Logique pour récupérer et afficher les avantages exclusifs pour les membres du programme
        $avantages = [
            'Tarifs réduits sur certains services',
            'Services de conciergerie à l\'aéroport',
            'Accès à des offres spéciales et exclusives'
        ];

        return view('abonne.programme_fidelite.avantages', [
            'avantages' => $avantages,
        ]);
    }
}
