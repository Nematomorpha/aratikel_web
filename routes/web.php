<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
 

Route::get('/', function () {
  return view ('data.welcome');
});

Route::get('/dashboard', function () {
    return view ('template.main');
  });


// Route::get('/user/{id}', [UserController::class, 'show']);
//route menggunakan function anonymous
Route::get('/kategori', function () {
    return "DATA KATEGORI";
});

Route::get('/artikel/{id}/ipk/{nama}', function ($id,$name) {
    return "DATA ARTIKEL YANG ID NYA $id dan namanya adalah $name";
});

//route redirect pakai vieww
Route::get('/data_kategori', function () {
    //pemisah antara folder dengan file
    //bisa pake . (titik) atau pake / (slash)
    return view('data.kategori');
});


//route dengan controller
Route::get('/controller', [LatihanController::class, 'tampil'])->name('dashboard');
Route::get('/cek/{id}/{nama}', [LatihanController::class, 'cekID']);
Route::get('/list/{id}', [LatihanController::class, 'index']);
Route::get('/form', [LatihanController::class, 'formPost']);
Route::post('/simpan', [LatihanController::class, 'simpan'])->name('simpanPost');

Route::get('/about', [LatihanController::class, 'about'])->name('about');
Route::get('/login', [LatihanController::class, 'login'])->name('login');
Route::get('/home', [LatihanController::class, 'home'])->name('home');

//route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dash');

Route::middleware(['auth'])->group(function() {

//route artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');

Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');

Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');

Route::get('/artikel/show/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('artikel.edit');

Route::put('/artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');

Route::get('/artikel/destroy/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
//  Route::resource('artikel', ArtikelController::class);

//route kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
// Route::get('/show/{id}', [KategoriController::class, 'show'])->name('show');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
//  Route::resource('kategori', ArtikelController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
