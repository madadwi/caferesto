<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManajerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\TransaksiController;
use App\Models\Menu;
use App\Models\Transaksi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ROUTE HALAMAN WELCOME
Route::get('/', function () {
    return view('welcome');
});
Route::get('/tampilanwelcome/contak', function () {
    return view('tampilanwelcome.contak.contact');
});
Route::get('/tampilanwelcome/menu', function () {
    return view('tampilanwelcome.menu.menuu');
});
Route::get('/tampilanwelcome/today', function () {
    return view('tampilanwelcome.today.special');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// MANAJER
Route::get('/menu', function () {
    $manajer = Menu::filter(request(['search']))->latest()->get();
    return view('Manajer.manajerComponent.menu', [
        'manajer' => $manajer
    ]);
});
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/print/{to}/{from}', [LaporanController::class, 'print'])->name('laporan.print');

// CONTROLLER
Route::resource('/admin/data', AdminController::class);
Route::resource('/manajer', ManajerController::class);
Route::resource('/kasir', OperatorController::class);

// OPERATOR/KASIR

Route::resource('/transaksi', TransaksiController::class);
Route::get('/transaksi/{id}/bayar', [TransaksiController::class, 'bayar'])->name('transaksis.bayar');
Route::post('/transaksi/{id}/bayar', [TransaksiController::class, 'buat'])->name('transaksis.buat');
