<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RespoController;

Route::get('/', [HomeController::class, 'index'])->name('accueil');

Route::prefix('admin')->group(function () {
    Route::get('manage-users', [AdminController::class, 'usersManagement'])->name('manage-users');
    Route::get('manage-reservations', [AdminController::class, 'reservationsManagement'])->name('manage-reservations');
    Route::get('manage-offers', [AdminController::class, 'offersManagement'])->name('manage-offers');
    Route::get('manage-services', [AdminController::class, 'servicesManagement'])->name('manage-services');
    Route::get('manage-vols', [AdminController::class, 'volsManagement'])->name('manage-vols');
    Route::get('manage-rapports', [AdminController::class, 'rapportsManagement'])->name('manage-rapports');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout'); // Unique name
});

Route::prefix('respo')->group(function () {
    Route::get('manage-admins', [RespoController::class, 'adminsManagement'])->name('manage-admins');
    Route::get('analyse-rapports', [RespoController::class, 'reportsAnaalyze'])->name('analyse-rapports');
    Route::get('communicate-prenantes', [RespoController::class, 'communicatePrenantes'])->name('communicate-prenantes');
    Route::get('elaborer-planes', [RespoController::class, 'planesElaborate'])->name('elaborer-planes');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('respo.logout'); // Unique name
});

// Route pour l'inscription
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
// Authentication Routes...
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});