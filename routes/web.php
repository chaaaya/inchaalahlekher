<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RapportController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\VolController;
use App\Http\Controllers\Respo\AdminController2;
use App\Http\Controllers\Respo\CommunicateController;
use App\Http\Controllers\Respo\ReportsController;
use App\Http\Controllers\Respo\ContinuityPlansController;
use App\Http\Controllers\nonAbonne\nonAbonneController;
use App\Http\Controllers\nonAbonne\Reservation1Controller;
use App\Http\Controllers\nonAbonne\HistoriqueVolsController;
use App\Http\Controllers\nonAbonne\OffresController;
use App\Http\Controllers\Abonne\AbonneController;
use App\Http\Controllers\nonAbonne\ServicesSupplementairesController;
use App\Http\Controllers\nonAbonne\SubscriptionController;
use App\Http\Controllers\Respo\StakeholderController;
use App\Models\Vol;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\ClientAuthController; // Assurez-vous que ce contrôleur existe
use App\Http\Controllers\RespoAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\nonAbonne\HistoriqueVolController;
use App\Http\Controllers\nonAbonne\OffreController;
use App\Http\Controllers\nonAbonne\SuivreVolController;
use App\Http\Controllers\nonAbonne\ServicesSupController;
use App\Http\Controllers\nonAbonne\SabonnerController;
use App\Http\Controllers\nonAbonne\MesReservationsController;
use App\Http\Controllers\nonAbonne\Hotel1Controller;
use App\Http\Controllers\nonAbonne\location1controller;
use App\Http\Controllers\nonAbonne\vol1controller;

Route::get('/', function () {
    return view('accueil');
})->name('accueil');

// Affichage du formulaire d'inscription
Route::get('/register', [ClientAuthController::class, 'showRegistrationForm'])->name('register');

// Traitement du formulaire d'inscription
Route::post('/register', [ClientAuthController::class, 'register'])->name('register.post');
Route::get('/check-email', [ClientAuthController::class, 'checkEmail'])->name('check-email');



// Routes pour l'administration
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Routes pour les responsables
Route::get('respo/login', [RespoAuthController::class, 'showLoginForm'])->name('respo.login');
Route::post('respo/login', [RespoAuthController::class, 'login']);
Route::post('respo/logout', [RespoAuthController::class, 'logout'])->name('respo.logout');

// Routes pour les clients
// Route pour afficher la page de login client
Route::get('client/login', [ClientAuthController::class, 'showLoginForm'])->name('client.login');

// Route pour traiter la soumission du formulaire de login client
Route::post('client/login', [ClientAuthController::class, 'login']);

// Route pour traiter la déconnexion du client
Route::post('client/logout', [ClientAuthController::class, 'logout'])->name('client.logout');



Route::get('/consulter-vols', function () {
    $vols = Vol::all();
    return view('consulter-vols', compact('vols'));
})->name('consulter.vols');

Route::get('/rechercher-vols', function (Request $request) {
    $ville_depart = $request->input('ville_depart');
    $ville_arrivee = $request->input('ville_arrivee');

    $vols = Vol::where('ville_depart', 'like', "%$ville_depart%")
                ->where('ville_arrivee', 'like', "%$ville_arrivee%")
                ->get();

    return view('consulter-vols', compact('vols'));
})->name('rechercher.vols');

Route::get('/about', function () {
    return view('about');
})->name('about');

 
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/welcome', function () {
        return view('admin.welcome');
    })->name('admin.welcome');

    // Routes spécifiques à l'administration
    Route::get('users/manage-users', [UserController::class, 'index'])->name('admin.users.manage-users');
    Route::get('reservation/manage-reservations', [ReservationController::class, 'index'])->name('admin.reservation.manage-reservations');
    Route::get('offers', [OfferController::class, 'index'])->name('admin.offers.index');
    Route::get('services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('vols', [VolController::class, 'index'])->name('admin.vols.index');
    Route::get('rapports', [RapportController::class, 'index'])->name('admin.rapports.index');
    Route::get('users/manage-users', [UserController::class, 'index'])->name('admin.users.manage-users');

    Route::get('admin/manage-users', [UserController::class, 'manageUsers'])->name('admin.manage-users');
   Route::put('users/{user}/accept', [UserController::class, 'accept'])->name('admin.users.accept');
   Route::put('users/{user}/reject', [UserController::class, 'reject'])->name('admin.users.reject');
   Route::resource('users', UserController::class)->except(['index']);

    Route::resource('offers', OfferController::class)->names([
        'index' => 'admin.offers.index',
        'create' => 'admin.offers.create',
        'store' => 'admin.offers.store',
        'edit' => 'admin.offers.edit',
        'update' => 'admin.offers.update',
        'destroy' => 'admin.offers.destroy',
    ]);

    Route::resource('services', ServiceController::class)->names([
        'index' => 'admin.services.index',
        'create' => 'admin.services.create',
        'store' => 'admin.services.store',
        'edit' => 'admin.services.edit',
        'update' => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
    ]);
    Route::prefix('hotels')->group(function () {
        Route::get('/', [HotelController::class, 'index'])->name('admin.hotels.index');
        Route::get('/create', [HotelController::class, 'create'])->name('admin.hotels.create');
        Route::post('/', [HotelController::class, 'store'])->name('admin.hotels.store');
        Route::get('/{hotel}/edit', [HotelController::class, 'edit'])->name('admin.hotels.edit');
        Route::patch('/{hotel}', [HotelController::class, 'update'])->name('admin.hotels.update'); // Utilisation de PATCH
        Route::delete('/{hotel}', [HotelController::class, 'destroy'])->name('admin.hotels.destroy');
    });
    
    

    Route::prefix('locations')->group(function () {
        Route::get('/', [LocationController::class, 'index'])->name('admin.locations.index');
        Route::get('/create', [LocationController::class, 'create'])->name('admin.locations.create');
        Route::post('/', [LocationController::class, 'store'])->name('admin.locations.store');
        Route::get('/{location}/edit', [LocationController::class, 'edit'])->name('admin.locations.edit');
        Route::patch('/{location}', [LocationController::class, 'update'])->name('admin.locations.update');
        Route::delete('/{location}', [LocationController::class, 'destroy'])->name('admin.locations.destroy');
    });

    Route::resource('vols', VolController::class)->names([
        'index' => 'admin.vols.index',
        'create' => 'admin.vols.create',
        'store' => 'admin.vols.store',
        'edit' => 'admin.vols.edit',
        'update' => 'admin.vols.update',
        'destroy' => 'admin.vols.destroy',
    ]);

    Route::resource('rapports', RapportController::class)->names([
        'index' => 'admin.rapports.index',
        'create' => 'admin.rapports.create',
        'store' => 'admin.rapports.store',
        'show' => 'admin.rapports.show',
        'edit' => 'admin.rapports.edit',
        'update' => 'admin.rapports.update',
        'destroy' => 'admin.rapports.destroy',
    ]);
    Route::resource('reservation', ReservationController::class)->names([
        'index' => 'admin.reservation.index',
        'create' => 'admin.reservation.create',
        'store' => 'admin.reservation.store',
        'edit' => 'admin.reservation.edit',
        'update' => 'admin.reservation.update',
        'destroy' => 'admin.reservation.destroy',
    ]);
    Route::put('reservation/{id}/accept', [ReservationController::class, 'accept'])->name('reservation.accept');
    Route::put('reservation/{id}/reject', [ReservationController::class, 'reject'])->name('reservation.reject');
});

Route::middleware(['auth:responsable'])->prefix('respo')->group(function () {
    // Route de bienvenue pour les responsables
    Route::get('/welcome', function () {
        return view('respo.welcome');
    })->name('respo.welcome');

    // Routes pour les administrateurs
    Route::resource('admins', AdminController2::class)->names([
        'index' => 'respo.admins.index',
        'create' => 'respo.admins.create',
        'store' => 'respo.admins.store',
        'show' => 'respo.admins.show',
        'edit' => 'respo.admins.edit',
        'update' => 'respo.admins.update',
        'destroy' => 'respo.admins.destroy',
    ]);



    Route::resource('stakeholders', StakeholderController::class)->names([
        'index' => 'respo.stakeholders.index',
        'create' => 'respo.stakeholders.create',
        'store' => 'respo.stakeholders.store',
        'show' => 'respo.stakeholders.show',
        'edit' => 'respo.stakeholders.edit',
        'update' => 'respo.stakeholders.update',
        'destroy' => 'respo.stakeholders.destroy',
    ]);

    Route::resource('continuity-plans', ContinuityPlansController::class)->names([
        'index' => 'respo.continuity-plans.index',
        'create' => 'respo.continuity-plans.create',
        'store' => 'respo.continuity-plans.store',
        'show' => 'respo.continuity-plans.show',
        'edit' => 'respo.continuity-plans.edit',
        'update' => 'respo.continuity-plans.update',
        'destroy' => 'respo.continuity-plans.destroy',
    ]);

    Route::resource('reports', ReportsController::class)->names([
        'index' => 'respo.reports.index',
        'create' => 'respo.reports.create',
        'store' => 'respo.reports.store',
        'show' => 'respo.reports.show',
        'edit' => 'respo.reports.edit',
        'update' => 'respo.reports.update',
        'destroy' => 'respo.reports.destroy',
    ]);

    Route::get('communicate', [CommunicateController::class, 'index'])->name('respo.communicate.index');
    Route::post('communicate/send', [CommunicateController::class, 'send'])->name('respo.communicate.send');
    Route::post('communicate/upload', [CommunicateController::class, 'upload'])->name('respo.communicate.upload');
    Route::delete('communicate/{id}/delete', [CommunicateController::class, 'deleteDocument'])->name('respo.communicate.delete');
});

// Route pour afficher la page de login client
Route::get('client/login', [ClientAuthController::class, 'showLoginForm'])->name('client.login');
Route::post('client/login', [ClientAuthController::class, 'login']);
Route::post('client/logout', [ClientAuthController::class, 'logout'])->name('client.logout');
// Routes pour les abonnés non abonnées
Route::middleware(['auth:client'])->prefix('nonabonne')->group(function () {

    // Page d'accueil non abonné
    Route::get('/', [nonAbonneController::class, 'index'])->name('nonabonne.index');

    // Routes pour les réservations de vols
    Route::prefix('vols')->group(function () {
        // Page principale des vols
        Route::get('/', [nonabonne\Vol1Controller::class, 'index'])->name('nonabonne.vols.index');
        
        // Page de réservation de vol
        Route::get('/reserver', [nonabonne\Vol1Controller::class, 'reserverVol'])->name('nonabonne.reserver.vol');

        // Page pour afficher le formulaire de réservation pour un vol spécifique
        Route::get('/{vol}/reserver', [nonabonne\Vol1Controller::class, 'showReservationForm'])->name('nonabonne.vols.reservation');

        // Traitement de la réservation de vol
        Route::post('/process-reservation', [nonabonne\Vol1Controller::class, 'processReservation'])->name('nonabonne.process.reservation');

        // Affichage des détails de la réservation
        Route::get('/{vol}/reservation/{reservation}/details', [nonabonne\Vol1Controller::class, 'showReservationDetails'])->name('nonabonne.reservation.details');
    });

    // Autres routes non abonnées
    Route::get('/mes-reservations', [MesReservationsController::class, 'index'])->name('mes.reservations');
    Route::get('/mes-reservations/{id}/edit', [MesReservationsController::class, 'edit'])->name('reservations.edit');
    Route::put('/mes-reservations/{id}', [MesReservationsController::class, 'update'])->name('reservations.update');
    Route::delete('/mes-reservations/{id}', [MesReservationsController::class, 'destroy'])->name('reservations.destroy');

    Route::get('/sabonner', [nonAbonneController::class, 'sabonner'])->name('nonabonne.sabonner');
    Route::get('/services-supplementaires', [ServicesSupController::class, 'index'])->name('nonabonne.services.supplementaires');
    Route::get('/hotels', [Hotel1Controller::class, 'index'])->name('hotels');
    Route::get('/locations', [location1controller::class, 'showLocations'])->name('car_rentals');
    Route::get('/suivre-vols', [Vol1Controller::class, 'suivreVols'])->name('nonabonne.suivre.vols');
    Route::get('/historique-vols', [nonAbonneController::class, 'historiqueVols'])->name('nonabonne.historique.vols');
    Route::get('/consulter-offres', [nonabonne\OffreController::class, 'index'])->name('nonabonne.consulter.offres');
    Route::get('/offers/{id}', 'App\Http\Controllers\nonabonne\OffreController@show')->name('nonabonne.offres.show');

Route::post('/offers/{offerId}/calculate-price', [OffreController::class, 'calculatePrice']);
});


Route::prefix('abonne')->group(function () {
    Route::get('/', function () {
        return view('client.abonne.index');
    })->name('abonne.index');

    Route::get('/reserver-vol', [abonne\AbonneController::class, 'reserverVol'])->name('abonne.reserver.vol');
    Route::post('/process-reservation', [abonne\AbonneController::class, 'processReservation'])->name('process.reservation');
    Route::get('/services-supplementaires', [AbonneController::class, 'servicesSupplementaires'])->name('abonne.services_supplementaires');
    Route::get('/historique-vols', [AbonneController::class, 'historiqueVols'])->name('abonne.historique.vols');
    Route::get('/consulter-offres', [AbonneController::class, 'consulterOffres'])->name('abonne.consulter.offres');
    Route::get('/suivre-vols', [AbonneController::class, 'suivreVols'])->name('abonne.suivre.vols');
    Route::get('/programme-fidelite', function () {
        return view('client.abonne.programme_fidelite');
    })->name('abonne.programme.fidelite');
});
