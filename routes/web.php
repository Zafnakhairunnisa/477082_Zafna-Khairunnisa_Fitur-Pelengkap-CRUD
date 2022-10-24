<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DNPController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\BukuController;

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

Route::get('/master', function () {
    return view('master');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/rendang', function () {
    return view('rendang');
});

Route::get('/sushi', function () {
    return view('sushi');
});

Route::get('/lasagna', function () {
    return view('lasagna');
});

Route::get('/nasiGoreng', function () {
    return view('nasiGoreng');
});

Route::get('/photos', [DNPController::class, 'Calo']);

Route::get('/coba', [photoController::class, 'Coba']);

Route::get('/buku', [BukuController::class, 'index']);

Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');

Route::post('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/buku/tampilData/{id}', [BukuController::class, 'tampilData'])->name('buku.tampilData');
Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');

Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');