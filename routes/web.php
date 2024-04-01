<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KecamatanKelurahanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\SiswaKriteriaController;
use App\Http\Controllers\TingkatController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\TingkatKelasController;

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

Route::get('/', [LandController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/akun', [AkunController::class, 'index'])->middleware('auth')->name('akun');
Route::get('/akun-add', [AkunController::class, 'create'])->middleware('auth')->name('akun-add');
Route::post('/akun-store', [AkunController::class, 'store'])->middleware('auth');
Route::get('/akun-edit/{id}', [AkunController::class, 'edit'])->middleware('auth')->name('akun-edit');
Route::put('/akun-update/{id}', [AkunController::class, 'update'])->middleware('auth');
Route::get('/akun-destroy/{id}', [AkunController::class, 'destroy'])->middleware('auth');

Route::get('/siswa', [SiswaController::class, 'index'])->middleware('auth')->name('siswa');
Route::get('/siswa-add', [SiswaController::class, 'create'])->middleware('auth')->name('siswa-add');
Route::post('/siswa-store', [SiswaController::class, 'store'])->middleware('auth');
Route::get('/siswa-edit/{id}', [SiswaController::class, 'edit'])->middleware('auth')->name('siswa-edit');
Route::put('/siswa-update/{id}', [SiswaController::class, 'update'])->middleware('auth');
Route::get('/siswa-destroy/{id}', [SiswaController::class, 'destroy'])->middleware('auth');
Route::get('/siswa-request', [SiswaController::class, 'request'])->name('siswa-request');
// Route::get('/siswa-cetak/{id}', [SiswaController::class, 'cetak']);

Route::get('/kriteria', [KriteriaController::class, 'index'])->middleware('auth')->name('kriteria');
Route::get('/kriteria-add', [KriteriaController::class, 'create'])->middleware('auth')->name('kriteria-add');
Route::post('/kriteria-store', [KriteriaController::class, 'store'])->middleware('auth');
Route::get('/kriteria-edit/{id}', [KriteriaController::class, 'edit'])->middleware('auth')->name('kriteria-edit');
Route::put('/kriteria-update/{id}', [KriteriaController::class, 'update'])->middleware('auth');
Route::get('/kriteria-destroy/{id}', [KriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/kriteria-request', [KriteriaController::class, 'request'])->name('kriteria-request');
Route::get('/kriteria_siswa-request', [KriteriaController::class, 'request_siswa'])->name('kriteria_siswa-request');
// Route::get('/kriteria-cetak/{id}', [KriteriaController::class, 'cetak']);

Route::get('/kecamatan_kelurahan', [KecamatanKelurahanController::class, 'index'])->middleware('auth')->name('kecamatan_kelurahan');
Route::get('/kecamatan_kelurahan-add', [KecamatanKelurahanController::class, 'create'])->middleware('auth')->name('kecamatan_kelurahan-add');
Route::post('/kecamatan_kelurahan-store', [KecamatanKelurahanController::class, 'store'])->middleware('auth');
Route::get('/kecamatan_kelurahan-edit/{id}', [KecamatanKelurahanController::class, 'edit'])->middleware('auth')->name('kecamatan_kelurahan-edit');
Route::put('/kecamatan_kelurahan-update/{id}', [KecamatanKelurahanController::class, 'update'])->middleware('auth');
Route::get('/kecamatan_kelurahan-destroy/{id}', [KecamatanKelurahanController::class, 'destroy'])->middleware('auth');
Route::get('/kecamatan_kelurahan-request', [KecamatanKelurahanController::class, 'request'])->name('kecamatan_kelurahan-request');

Route::get('/kecamatan', [KecamatanController::class, 'index'])->middleware('auth')->name('kecamatan');
Route::get('/kecamatan-add', [KecamatanController::class, 'create'])->middleware('auth')->name('kecamatan-add');
Route::post('/kecamatan-store', [KecamatanController::class, 'store'])->middleware('auth');
Route::get('/kecamatan-edit/{id}', [KecamatanController::class, 'edit'])->middleware('auth')->name('kecamatan-edit');
Route::put('/kecamatan-update/{id}', [KecamatanController::class, 'update'])->middleware('auth');
Route::get('/kecamatan-destroy/{id}', [KecamatanController::class, 'destroy'])->middleware('auth');
Route::get('/kecamatan-request', [KecamatanController::class, 'request'])->name('kecamatan-request');

Route::get('/kelurahan', [KelurahanController::class, 'index'])->middleware('auth')->name('kelurahan');
Route::get('/kelurahan-add', [KelurahanController::class, 'create'])->middleware('auth')->name('kelurahan-add');
Route::post('/kelurahan-store', [KelurahanController::class, 'store'])->middleware('auth');
Route::get('/kelurahan-edit/{id}', [KelurahanController::class, 'edit'])->middleware('auth')->name('kelurahan-add');
Route::put('/kelurahan-update/{id}', [KelurahanController::class, 'update'])->middleware('auth');
Route::get('/kelurahan-destroy/{id}', [KelurahanController::class, 'destroy'])->middleware('auth');

Route::get('/siswa_kriteria', [SiswaKriteriaController::class, 'index'])->middleware('auth')->name('siswa_kriteria');
Route::get('/siswa_kriteria-add', [SiswaKriteriaController::class, 'create'])->middleware('auth')->name('siswa_kriteria-add');
// Route::post('/siswa_kriteria-validator_add', [SiswaKriteriaController::class, 'validator_add'])->middleware('auth');
Route::post('/siswa_kriteria-store', [SiswaKriteriaController::class, 'store'])->middleware('auth');
Route::get('/siswa_kriteria-edit/{id}', [SiswaKriteriaController::class, 'edit'])->middleware('auth')->name('siswa_kriteria-edit');
// Route::post('/siswa_kriteria-validator_edit/{id}', [SiswaKriteriaController::class, 'validator_edit'])->middleware('auth');
Route::put('/siswa_kriteria-update/{id}', [SiswaKriteriaController::class, 'update'])->middleware('auth');
Route::get('/siswa_kriteria-destroy/{id}', [SiswaKriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/siswa_kriteria-request', [SiswaKriteriaController::class, 'siswa_request'])->name('siswa_kriteria-request');
Route::get('/siswa_kriteria-set/{id}', [SiswaKriteriaController::class, 'set'])->name('siswa_kriteria-set');
Route::put('/siswa_kriteria-apply', [SiswaKriteriaController::class, 'apply'])->name('siswa_kriteria-apply');
// Route::get('/siswa_kriteria-cetak/{id}', [SiswaKriteriaController::class, 'cetak']);

Route::get('/tingkat_kelas', [TingkatKelasController::class, 'index'])->middleware('auth')->name('tingkat_kelas');
Route::get('/tingkat_kelas-add', [TingkatKelasController::class, 'create'])->middleware('auth')->name('tingkat_kelas-add');
Route::post('/tingkat_kelas-store', [TingkatKelasController::class, 'store'])->middleware('auth');
Route::get('/tingkat_kelas-edit/{id}', [TingkatKelasController::class, 'edit'])->middleware('auth')->name('tingkat_kelas-edit');
Route::put('/tingkat_kelas-update/{id}', [TingkatKelasController::class, 'update'])->middleware('auth');
Route::get('/tingkat_kelas-destroy/{id}', [TingkatKelasController::class, 'destroy'])->middleware('auth');
Route::get('/tingkat_kelas-request', [TingkatKelasController::class, 'request'])->name('tingkat_kelas-request');

Route::get('/tingkat', [TingkatController::class, 'index'])->middleware('auth')->name('tingkat');
Route::get('/tingkat-add', [TingkatController::class, 'create'])->middleware('auth')->name('tingkat-add');
Route::post('/tingkat-store', [TingkatController::class, 'store'])->middleware('auth');
Route::get('/tingkat-edit/{id}', [TingkatController::class, 'edit'])->middleware('auth')->name('tingkat-edit');
Route::put('/tingkat-update/{id}', [TingkatController::class, 'update'])->middleware('auth');
Route::get('/tingkat-destroy/{id}', [TingkatController::class, 'destroy'])->middleware('auth');
Route::get('/tingkat-request', [TingkatController::class, 'request'])->name('tingkat-request');

Route::get('/kelas', [KelasController::class, 'index'])->middleware('auth')->name('kelas');
Route::get('/kelas-add', [KelasController::class, 'create'])->middleware('auth')->name('kelas-add');
Route::post('/kelas-store', [KelasController::class, 'store'])->middleware('auth');
Route::get('/kelas-edit/{id}', [KelasController::class, 'edit'])->middleware('auth')->name('kelas-edit');
Route::put('/kelas-update/{id}', [KelasController::class, 'update'])->middleware('auth');
Route::get('/kelas-destroy/{id}', [KelasController::class, 'destroy'])->middleware('auth');
Route::get('/kelas-request', [KelasController::class, 'request'])->name('kelas-request');

Route::get('/perhitungan', [PerhitunganController::class, 'validator'])->middleware('auth')->name('perhitungan');
Route::get('/cetak-hasil', [PerhitunganController::class, 'cetak'])->middleware('auth')->name('cetak-hasil');