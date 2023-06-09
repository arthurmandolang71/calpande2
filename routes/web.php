<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TimTpsController;
use App\Http\Controllers\Dpt2020Controller;
use App\Http\Controllers\PenjaringanController;
use App\Http\Controllers\PenyaringanController;
use App\Http\Controllers\TimClientTpsController;
use App\Http\Controllers\TimClientDashController;
use App\Http\Controllers\TimLingkunganController;
use App\Http\Controllers\DashboardClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return 'berhasil';
});

Route::redirect('/','/home');

Route::redirect('/home','/welcome');

Route::view('/welcome','dashboard.welcome', [ 'name' => session()->get('username') ])->middleware('auth');

// dashboard all
Route::get('/client_dash/insight', [DashboardClientController::class, 'insight'])->middleware('isAdminClient');
Route::get('/client_dash/dashboard', [DashboardClientController::class, 'dapil'])->middleware('isAdminClient');

Route::controller(ProfilController::class)->middleware('auth')->group(function () {
    Route::get('/profil/{user}', 'show');
    Route::get('/profil/{user}/edit', 'edit');
    Route::put('/profil/{user}', 'update');
});


// admin system
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::post('/login', 'auth');
    Route::post('/logout', 'logout');
});

Route::controller(Dpt2020Controller::class)->middleware('isSuperAdmin')->group(function () {
    Route::get('/dpt2020', 'index');
    Route::get('/dpt2020/create', 'create');
    Route::post('/dpt2020', 'store');
    Route::get('/pemilih/dpt2020', 'pemilih');
    Route::get('/pemilih/dpt2020/{dpt2020}', 'pemilih_show');
    Route::get('/print/dpt2020/', 'pemilih_print');
});

Route::put('/clients/update_status/{user}',[ClientController::class, 'update_status'])->middleware('isSuperAdmin');
Route::resource('/clients', ClientController::class)->except(['destroy'])->middleware('isSuperAdmin')->parameters([
    'clients' => 'user',
]);




// admin client
Route::put('/tim/update_status/{user}',[TimController::class, 'update_status'])->middleware('isAdminClient');
Route::resource('/tim', TimController::class)->except(['destroy'])->middleware('isAdminClient')->parameters([
    'tim' => 'user',
]);

// Route::controller(TimLingkunganController::class)->middleware('isAdminClient')->group(function () {
//     Route::get('/plotting_ling/tim', 'index');
//     Route::post('/plotting_ling/tim', 'store');
//     Route::delete('/plotting_ling/tim/{lokasianggotalingkungan}', 'destroy');
//     Route::get('/get_lingkungan/tim/{id}', 'getLingkungan');
// });

Route::controller(TimTpsController::class)->middleware('isAdminClient')->group(function () {
    Route::get('/plotting_tps/tim', 'index');
    Route::post('/plotting_tps/tim', 'store');
    Route::delete('/plotting_tps/tim/{lokasianggotatps}', 'destroy');
    Route::get('/get_tps/tim/{id}', 'getTps');
});


Route::controller(PenjaringanController::class)->middleware('isAdminClient')->group(function () {
    Route::get('/penjaringan', 'index');
    Route::post('/penjaringan', 'store');
    Route::get('/penjaringan/create/{dpt2020}', 'create');
    Route::get('/print/penjaringan/', 'print');
});

Route::controller(PenyaringanController::class)->middleware('isAdminClient')->group(function () {
    Route::get('/penyaringan', 'index');
    Route::get('/penyaringan/{PemilihClient}/edit', 'edit');
    Route::put('/penyaringan/{PemilihClient}', 'update');
});


// tim client
Route::get('/tim_dash/dashboard', [TimClientDashController::class, 'index'])->middleware('isTimClient');

Route::controller(TimClientPenjaringanController::class)->middleware('isTimClient')->group(function () {
    Route::get('/penjaringantim', 'index');
    Route::post('/penjaringantim', 'store');
    Route::get('/penjaringantim/create/{dpt2020}', 'create');
    Route::get('/print/penjaringantim/', 'print');
});

Route::controller(TimClientPenyaringanController::class)->middleware('isTimClient')->group(function () {
    Route::get('/penyaringantim', 'index');
    Route::get('/penyaringantim/{PemilihClient}/edit', 'edit');
    Route::put('/penyaringantim/{PemilihClient}', 'update');
});



