<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FakturController;

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
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/createUser', [AdminController::class, 'getValidateUser']);
Route::post('create1', [AdminController::class, 'postValidate']);

// Route::get('/loginAdmin', [AdminController::class, 'getValidate']);
// Route::post('login', [AdminController::class, 'login']);

Route::get('/loginUser', [AdminController::class, 'getValidate']);
Route::post('/login2', [AdminController::class, 'login1']);

Route::get('/createItem', [BarangController::class, 'getValidate']);
Route::post('create', [BarangController::class, 'store']);

Route::get('/get-items', [BarangController::class, 'getItems']);

Route::get('/edits/{id}', [BarangController::class, 'showData']);
Route::post('edits', [BarangController::class, 'updatedata']);
Route::get('list', [BarangController::class, 'list']);
Route::get('/delete/{id}', [BarangController::class, 'delete']);

Route::get('/get-items-users', [BarangController::class, 'getItemsUser']);

Route::get('/createFaktur', [FakturController::class, 'getValidate']);
Route::post('/create2', [FakturController::class, 'postValidate']);

Route::get('/get-invoice', [FakturController::class, 'getFaktur']);
