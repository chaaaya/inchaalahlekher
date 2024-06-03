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
use App\Http\Controllers\Abonne\OffresController;
use App\Http\Controllers\nonabonne\NonAbonneController;
use App\Http\Controllers\Abonne\ServicesSupplementairesController;
use App\Http\Controllers\AuthController;


// Page d'accueil
Route::get('/', function () {
    return view('accueil');
})->name('accueil');

// Authentification et gestion des rôles
// Afficher le formulaire de connexion, gestion optionnelle des rôles
Route::get('login/{role?}', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->where('role', 'admin|respo|client'); // Contrainte sur le rôle

// Traitement de la connexion
Route::post('login', [AuthController::class, 'login']);

// Afficher le formulaire d'inscription
Route::get('register/{role}', [AuthController::class, 'showRegisterForm'])->name('register');

// Traitement de l'inscription
Route::post('register/{role}', [AuthController::class, 'register']);

// Déconnexion
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Vérification d'email utilisée dans les formulaires AJAX pour vérifier la disponibilité des emails
Route::get('check-email', [AuthController::class, 'checkEmail'])->name('check-email');

// Routes pour les tableaux de bord spécifiques aux rôles, sécurisées par le middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::get('admin/users/manage-users', function () {
        return view('admin.users.manage-users');
    })->name('admin.users.manage-users');

    Route::get('respo/dashboard', function () {
        return view('respo.dashboard');
    })->name('respo.dashboard');

    Route::get('client/dashboard', function () {
        return view('client.dashboard');
    })->name('client.dashboard');
});

// Page À propos
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes pour l'administration sans authentification
Route::prefix('admin')->group(function () {
    Route::get('manage-users', [AdminController::class, 'usersManagement'])->name('manage-users');
    Route::get('manage-reservations', [ReservationController::class, 'index'])->name('manage-reservations');
    Route::get('manage-offers', [AdminController::class, 'offersManagement'])->name('manage-offers');
    Route::get('manage-services', [AdminController::class, 'servicesManagement'])->name('manage-services');
    Route::get('manage-vols', [AdminController::class, 'volsManagement'])->name('manage-vols');
    Route::get('manage-rapports', [RapportController::class, 'index'])->name('manage-rapports');

    // Routes pour les rapports
    Route::get('rapports/create', [RapportController::class, 'create'])->name('rapports.create');
    Route::post('rapports', [RapportController::class, 'store'])->name('rapports.store');
    Route::get('rapports/{rapport}', [RapportController::class, 'show'])->name('rapports.show');
    Route::get('rapports/{rapport}/edit', [RapportController::class, 'edit'])->name('rapports.edit');
    Route::put('rapports/{rapport}', [RapportController::class, 'update'])->name('rapports.update');
    Route::delete('rapports/{rapport}', [RapportController::class, 'destroy'])->name('rapports.destroy');

    // Routes pour les utilisateurs
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Page d'accueil de l'administration
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Gestion des réservations
    Route::get('/reservation/manage-reservations', [ReservationController::class, 'index'])->name('admin.reservation.manage-reservations');
    Route::get('/reservation/create-reservation', [ReservationController::class, 'create'])->name('admin.reservation.create-reservation');
    Route::post('/reservation/store-reservation', [ReservationController::class, 'store'])->name('admin.reservation.store-reservation');
    Route::get('/reservation/edit-reservation/{id}', [ReservationController::class, 'edit'])->name('admin.reservation.edit-reservation');
    Route::put('/reservation/update-reservation/{id}', [ReservationController::class, 'update'])->name('admin.reservation.update-reservation');
    Route::delete('/reservation/destroy-reservation/{id}', [ReservationController::class, 'destroy'])->name('admin.reservation.destroy-reservation');
});
// Routes pour les administrateurs (respo)
Route::prefix('respo')->group(function () {
    Route::get('/admins', [App\Http\Controllers\Respo\AdminController2::class, 'index'])->name('respo.admins.index');
    Route::get('/admins/create', [App\Http\Controllers\Respo\AdminController2::class, 'create'])->name('respo.admins.create');
    Route::post('/admins', [App\Http\Controllers\Respo\AdminController2::class, 'store'])->name('respo.admins.store');
    Route::get('/admins/{id}', [App\Http\Controllers\Respo\AdminController2::class, 'show'])->name('respo.admins.show');
    Route::get('/admins/{id}/edit', [App\Http\Controllers\Respo\AdminController2::class, 'edit'])->name('respo.admins.edit');
    Route::put('/admins/{id}', [App\Http\Controllers\Respo\AdminController2::class, 'update'])->name('respo.admins.update');
    Route::delete('/admins/{id}', [App\Http\Controllers\Respo\AdminController2::class, 'destroy'])->name('respo.admins.destroy');
});

// Auth routes
require __DIR__.'/auth.php';

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

// Routes pour les offres
Route::prefix('admin')->group(function () {
    Route::get('offers', [OfferController::class, 'index'])->name('admin.offers.index');
    Route::get('offers/create', [OfferController::class, 'create'])->name('admin.offers.create');
    Route::post('offers', [OfferController::class, 'store'])->name('admin.offers.store');
    Route::get('offers/{offer}/edit', [OfferController::class, 'edit'])->name('admin.offers.edit');
    Route::put('offers/{offer}', [OfferController::class, 'update'])->name('admin.offers.update');
    Route::delete('offers/{offer}', [OfferController::class, 'destroy'])->name('admin.offers.destroy');
});

// Routes pour les services
Route::prefix('admin')->group(function () {
    Route::get('service', [ServiceController::class, 'index'])->name('admin.service.manage-services');
    Route::get('service/create-service', [ServiceController::class, 'create'])->name('admin.service.create-service');
    Route::post('service', [ServiceController::class, 'store'])->name('admin.service.store');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.service.edit-service');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');
});

// Routes pour les vols
Route::prefix('admin')->group(function () {
    Route::get('vols', [VolController::class, 'index'])->name('admin.vols.index');
    Route::get('vols/create', [VolController::class, 'create'])->name('admin.vols.create');
    Route::post('vols', [VolController::class, 'store'])->name('admin.vols.store');
    Route::get('vols/{vol}/edit', [VolController::class, 'edit'])->name('admin.vols.edit');
    Route::put('vols/{vol}', [VolController::class, 'update'])->name('admin.vols.update');
    Route::delete('vols/{vol}', [VolController::class, 'destroy'])->name('admin.vols.destroy');
});

// routes/web.php



Route::get('/abonne', [AbonneController::class, 'index'])->name('abonne.index');

Route::get('/sabonner', [AbonneController::class, 'sabonner'])->name('sabonner');
Route::get('/services-supplementaires', [AbonneController::class, 'servicesSupplementaires'])->name('services.supplementaires');
Route::get('/reserver-un-vol', [AbonneController::class, 'reserverVol'])->name('reserver.vol');
Route::get('/historique-des-vols', [AbonneController::class, 'historiqueVols'])->name('historique.vols');
// routes/web.php

Route::get('/consulter-nos-offres', [OffresController::class, 'index'])->name('consulter.offres');
Route::get('/suivre-les-vols', [AbonneController::class, 'suivreVols'])->name('suivre.vols');
Route::post('/process-reservation', [AbonneController::class, 'processReservation'])->name('process.reservation');


// routes/web.php


Route::get('/historique-vols', [HistoriqueVolsController::class, 'index'])->name('historique.vols');
Route::get('/offres', [OffresController::class, 'index'])->name('offres.index');
// routes/web.php

// routes/web.php

Route::get('/suivre-les-vols', [AbonneController::class, 'suivreVols'])->name('suivre.vols');

Route::get('/services-supplementaires', [ServicesSupplementairesController::class, 'index'])
    ->name('services.supplementaires');



    //nonabonne
// routes/web.php
// routes/web.php
Route::get('/non_abonne/index', [NonAbonneController::class, 'index'])->name('nonabonne.index');
Route::get('/non_abonne/services-supplementaires', [NonAbonneController::class, 'servicesSupplementaires'])->name('nonabonne.services_supplementaires');
Route::get('/programme-fidelite', function () {return view('nonabonne.programme_fidelite');})->name('programme.fidelite');