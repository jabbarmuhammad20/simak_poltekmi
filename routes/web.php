<?php

  

use Illuminate\Support\Facades\Route;

  

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;

  

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



// Route::get('/master', function () {
//     return view('layouts.master_mhs');
// });
Route::get('ressetconfig', function (){
	Artisan::call('route:clear');
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
	});
route::get('/',[LoginController::class,'showLoginForm'])->name('/');
Route::get('logout', [LoginController::class,'logout']);  
  

Auth::routes();

  

/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:user'])->group(function () {

  

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('nilai', [MahasiswaController::class, 'nilai'])->name('nilai');
    Route::get('matakuliah', [MahasiswaController::class, 'daftarMatkul'])->name('matakuliah');
    Route::get('krs', [MahasiswaController::class, 'krs'])->name('krs');
    Route::post('inputkrs', [MahasiswaController::class, 'inputkrs'])->name('inputkrs');

});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {

  

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/tambah', [AdminController::class, 'createMhs'])->name('admin.tambah');
	Route::post('tambahstore', [AdminController::class, 'storeMhs'])->name('tambahstore');
	Route::get('/admin/tambahmatkul', [AdminController::class, 'createMatkul'])->name('admin.tambahmatkul');
	Route::post('tambahmatkulstore', [AdminController::class, 'storeMatkul'])->name('tambahmatkulstore');
	Route::get('/admin/daftarmatkul', [AdminController::class, 'daftarMatkul'])->name('admin.daftarmatkul');
});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {

  

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');

});