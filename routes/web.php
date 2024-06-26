<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

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

Route::get('ressetconfig', function (){
	Artisan::call('route:clear');
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');

});

Route::get('/teamplat_nilai', function () {
	return Storage::download('Upload_Nilai.xlsx')->name('teamplat_nilai');
});

Route::controller(LoginController::class)->group(function () {
	route::get('/',[LoginController::class,'showLoginForm'])->name('/');
	Route::get('logout', [LoginController::class,'logout']);  
});
 
Auth::routes();  

Route::middleware(['auth'])->group(function () {
	Route::prefix('dashboard')->group(function () { 
		Route::controller(HomeController::class)->group(function () { 
			Route::match(['GET'], '/', 'index')->name('dashboard');
		});
		Route::middleware(['auth', 'user-access:user'])->group(function () {
			Route::prefix('mahasiswa')->group(function () { 
				Route::controller(MahasiswaController::class)->group(function () { 
					Route::match(['GET'], 'nilai','nilai')->name('mahasiswa.nilai');
					Route::match(['GET'], 'matakuliah','daftarMatkul')->name('mahasiswa.matakuliah');
					Route::match(['GET'], 'cetak','printKrs')->name('mahasiswa.printkrs');
					Route::match(['GET'], 'biodata','Biodata')->name('mahasiswa.biodata');
					Route::match(['PUT'], 'update_biodata','update_biodata')->name('mahasiswa.update_biodata');
					Route::match(['GET'], 'krs','krs')->name('mahasiswa.krs');
					Route::match(['GET', 'POST'], 'inputkrs','inputkrs')->name('mahasiswa.inputkrs');
				});
			});
		});
		
		Route::middleware(['auth', 'user-access:admin'])->group(function () {
			Route::prefix('admin')->group(function () { 
				Route::controller(AdminController::class)->group(function () { 
					Route::match(['GET', 'POST'], 'tambah/dosen', 'createDosen')->name('admin.store.dosen');
					Route::match(['GET', 'POST'], 'tambah/mahasiswa', 'createMahasiswa')->name('admin.store.mahasiswa');
					Route::match(['GET', 'POST'], 'tambah/matkul', 'createMatkul')->name('admin.store.matkul');
					Route::match(['GET'], 'Arsip/matkul', 'arsipMatkul')->name('admin.arsip.matkul');
					Route::match(['GET'], 'daftar/mahasiswa', 'daftarMahasiswa')->name('admin.daftar.mahasiswa');
					Route::match(['GET'], 'daftar/mahasiswa_nonaktif', 'daftarMahasiswa_nonaktif')->name('admin.daftar.mahasiswa_nonaktif');
					Route::match(['GET'], 'daftar/dosen', 'daftarDosen')->name('admin.daftar.dosen');
					Route::match(['GET'], 'daftar/nilai', 'daftarnilaiMahasiswa')->name('admin.daftar.nilai');
					Route::match(['GET'], 'verMatkul', 'verMatkul')->name('admin.daftar.matkul');
					Route::match(['GET'], 'daftar/matkul/{id}/nilai', 'getNilaiByMatkul')->name('admin.matkul.nilai');
					Route::match(['PUT'], 'inputnilai/{id}nilai', 'input_nilai')->name('admin.input.nilai');
					Route::match(['PUT'], 'inputnilai/{id}', 'updateMatkul')->name('admin.update.matkul');
					Route::match(['POST'], 'importnilai', 'importnilaiMahasiswa')->name('admin.importnilai');
					Route::match(['GET'], 'deleted/nilai/{id}', 'deleted_nilai')->name('admin.delete.nilai');
					Route::match(['GET'], 'daftar/matkul/{id}/nilai', 'getNilaiByMatkul')->name('admin.matkul.nilai');
					Route::match(['GET'], 'update_semesterExport', 'update_semesterExport')->name('admin.update.export');
					Route::match(['PUT'], 'update_semesterImport', 'update_semesterImport')->name('admin.update.Import');
					Route::match(['GET','POST'], 'kelas', 'pengaturankelas')->name('admin.pengaturankelas');
					Route::match(['GET'], 'pengaturan', 'pengaturan')->name('admin.pengaturan.tahunakademik');
					Route::match(['GET'], 'pengaturan{id}', 'updateTahunakademik')->name('admin.pengaturan.updatetahunakademik');
					
				});
			});
		});
		
		Route::middleware(['auth', 'user-access:dosen'])->group(function () {
			Route::prefix('dosen')->group(function () { 
				Route::controller(DosenController::class)->group(function () { 
					Route::match(['GET', 'POST'], 'tambah/matkul', 'createMatkul')->name('dosen.store.matkul');
					Route::match(['GET'], 'daftar/matkul', 'daftarMatkul')->name('dosen.daftar.matkul');
					Route::match(['GET'], 'daftar/matkul/{id}/nilai', 'getNilaiByMatkul')->name('dosen.matkul.nilai');
					Route::match(['PUT'], 'inputnilai/{id}', 'input_nilai')->name('dosen.input.nilai');
				});
			});
		});
	});
});