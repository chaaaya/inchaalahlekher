<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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
use App\Http\Controllers\Abonne\AbonneController;
use App\Http\Controllers\Abonne\HistoriqueVolsController;
use App\Http\Controllers\Abonne\NewSubscriptionController;
use App\Http\Controllers\Abonne\OffresController;
use App\Http\Controllers\NonAbonne\NonAbonneController;
use App\Http\Controllers\Abonne\ServicesSupplementairesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Abonne\SubscriptionController;
use App\Models\Vol; // Importer le modèle Vol
use Illuminate\Http\Request; // Importer la classe Request
 

Route::get('/', function () {
    return view('accueil');
})->name('accueil');

Route::get('/consulter-vols', function () {
    $vols = Vol::all(); // Récupérer tous les vols
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
Route::get('login/{role?}', [AuthController::class, 'showLoginForm'])->name('login')->where('role', 'admin|respo|client');
Route::post('login', [AuthController::class, 'login']);
Route::get('register/{role}', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register/{role}', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('check-email', [AuthController::class, 'checkEmail'])->name('check-email');

Route::middleware(['auth'])->group(function () {
    Route::get('admin/service/manage-services', function () {
        return view('admin.service.manage-services');
    })->name('admin.service.manage-services');

    Route::get('client/dashboard', function () {
        return view('client.dashboard');
    })->name('client.dashboard');

    Route::middleware(['verified'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('manage-users', [AdminController::class, 'usersManagement'])->name('manage-users');
    Route::get('manage-reservations', [ReservationController::class, 'index'])->name('manage-reservations');
    Route::get('manage-offers', [AdminController::class, 'offersManagement'])->name('manage-offers');
    Route::get('manage-services', [AdminController::class, 'servicesManagement'])->name('manage-services');
    Route::get('manage-vols', [AdminController::class, 'volsManagement'])->name('manage-vols');
    Route::get('manage-rapports', [RapportController::class, 'index'])->name('manage-rapports');

    Route::resource('rapports', RapportController::class)->names([
        'index' => 'admin.rapports.index',
        'create' => 'admin.rapports.create',
        'store' => 'admin.rapports.store',
        'edit' => 'admin.rapports.edit',
        'update' => 'admin.rapports.update',
        'destroy' => 'admin.rapports.destroy',
    ]);

    Route::resource('users', UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

    Route::resource('offers', OfferController::class)->names([
        'index' => 'admin.offers.index',
        'create' => 'admin.offers.create',
        'store' => 'admin.offers.store',
        'edit' => 'admin.offers.edit',
        'update' => 'admin.offers.update',
        'destroy' => 'admin.offers.destroy',
    ]);
   
    Route::resource('service', ServiceController::class)->names([
        'index' => 'admin.service.manage-services',
        'create' => 'admin.service.create-service',
        'store' => 'admin.service.store',
        'edit' => 'admin.service.edit-service',
        'update' => 'admin.service.update',
        'destroy' => 'admin.service.destroy',
    ]);
    

    Route::resource('vols', VolController::class)->names([
        'index' => 'admin.vols.index',
        'create' => 'admin.vols.create',
        'store' => 'admin.vols.store',
        'edit' => 'admin.vols.edit',
        'update' => 'admin.vols.update',
        'destroy' => 'admin.vols.destroy',
    ]);

    Route::resource('reservation', ReservationController::class)->names([
        'index' => 'admin.reservation.index',
        'create' => 'admin.reservation.create',
        'store' => 'admin.reservation.store',
        'edit' => 'admin.reservation.edit',
        'update' => 'admin.reservation.update',
        'destroy' => 'admin.reservation.destroy',
    ]);
});

Route::prefix('respo')->group(function () {
    Route::resource('admins', AdminController2::class)->names([
        'index' => 'respo.admins.index',
        'create' => 'respo.admins.create',
        'store' => 'respo.admins.store',
        'show' => 'respo.admins.show',
        'edit' => 'respo.admins.edit',
        'update' => 'respo.admins.update',
        'destroy' => 'respo.admins.destroy',
    ]);
});

Route::prefix('abonne')->group(function () {
    Route::get('/', [AbonneController::class, 'index'])->name('abonne.index');
    Route::get('/services-supplementaires', [ServicesSupplementairesController::class, 'index'])->name('services.supplementaires');
    Route::get('/reserver-un-vol', [AbonneController::class, 'reserverVol'])->name('reserver.vol');
    Route::get('/historique-des-vols', [HistoriqueVolsController::class, 'index'])->name('historique.vols');
    Route::get('/consulter-nos-offres', [OffresController::class, 'index'])->name('consulter.offres');
    Route::get('/suivre-les-vols', [AbonneController::class, 'suivreVols'])->name('suivre.vols');
    Route::post('/process-reservation', [AbonneController::class, 'processReservation'])->name('process.reservation');
    
    // Route pour afficher le formulaire d'abonnement
    Route::get('/s-abonner', [NewSubscriptionController::class, 'showSubscriptionForm'])->name('s_abonner');
    // Route pour traiter le formulaire d'abonnement
    Route::post('/s-abonner', [NewSubscriptionController::class, 'processSubscription'])->name('process.subscription');
});

Route::prefix('non_abonne')->group(function () {
    Route::get('/index', [NonAbonneController::class, 'index'])->name('nonabonne.index');
    Route::get('/services-supplementaires', [NonAbonneController::class, 'servicesSupplementaires'])->name('nonabonne.services_supplementaires');
    Route::get('/programme-fidelite', function () {
        return view('nonabonne.programme_fidelite');
    })->name('programme.fidelite');
});
