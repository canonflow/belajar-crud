<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/add', [AdminController::class, 'create'])
    ->name('admin.tambah-matakuliah');

Route::post('/admin/add', [AdminController::class, 'store'])
    ->name('admin.tambah-matakuliah');

Route::get('/admin/matakuliah/{course}', [AdminController::class, 'edit'])
    ->name('admin.ubah-matakuliah');

Route::post('/admin/matakuliah/{course}', [AdminController::class, 'update'])
    ->name('admin.simpan-matakuliah');

Route::delete('admin/matakuliah/{course}/destroy', [AdminController::class, 'destroy'])
    ->name('admin.hapus-matakuliah');

// MANY TO MANY
Route::get('/admin/matakuliah/{course}/mahasiswa', [AdminController::class, 'mahasiswa'])
    ->name('admin.matakuliah-mahasiswa');

Route::get('/admin/matakuliah/{course}/mahasiswa/tambah', [AdminController::class, 'viewTambahMahasiswa'])
    ->name('admin.matakuliah-mahasiswa.tambah');

Route::post('/admin/matakuliah/{course}/mahasiswa/tambah', [AdminController::class, 'storeMahasiswa'])
    ->name('admin.matakuliah-mahasiswa.tambah');

Route::get('/admin/matakuliah/{course}/mahasiswa/{student}/ubah', [AdminController::class, 'viewUbahMahasiswa'])
    ->name('admin.matakuliah-mahasiswa-ubah');

Route::post('/admin/matakuliah/{course}/mahasiswa/{student}/ubah', [AdminController::class, 'ubahMahasiswa'])
    ->name('admin.matakuliah-mahasiswa-ubah');

Route::delete('/admin/matakuliah/{course}/mahasiswa/{student}/destroy', [AdminController::class, 'deleteMahasiswa'])
    ->name('admin.matakuliah-mahasiswa-destroy');


