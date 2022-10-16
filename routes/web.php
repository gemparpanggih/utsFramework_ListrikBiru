<?php

use App\Http\Controllers\TarifController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/tarif', [TarifController::class, 'dashboard']);
Route::get('/tarif/tambah', [TarifController::class, 'tambah']);
Route::post('/tarif/store', [TarifController::class, 'store']);
Route::get('/tarif/edit/{id}', [TarifController::class, 'edit']);
Route::post('/tarif/update', [TarifController::class, 'update']);
Route::get('/tarif/hapus/{id}', [TarifController::class, 'hapus']);