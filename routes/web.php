<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\QueryBuilderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EloquentController;

Route::get('/', function () {
    return view('welcome');
});

// Routing menuju Controller
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::get('/laporan', LaporanPenjualanController::class);

// Acara 20 - Form and Validation
Route::get('/form', [FormController::class, 'index']);
Route::post('/form/submit', [FormController::class, 'submit']);

// Acara 17 - Query Builder
Route::prefix('query-builder')->name('query-builder.')->group(function () {
    Route::get('/', [QueryBuilderController::class, 'index'])->name('index');
    Route::get('/store', [QueryBuilderController::class, 'store'])->name('store');
    Route::get('/get', [QueryBuilderController::class, 'getData'])->name('get');
    Route::get('/update', [QueryBuilderController::class, 'updateData'])->name('update');
    Route::get('/delete', [QueryBuilderController::class, 'deleteData'])->name('delete');
    Route::get('/pluck', [QueryBuilderController::class, 'pluckData'])->name('pluck');
    Route::get('/aggregate', [QueryBuilderController::class, 'aggregateData'])->name('aggregate');
    Route::get('/join', [QueryBuilderController::class, 'joinData'])->name('join');
    Route::get('/order-limit', [QueryBuilderController::class, 'orderLimitData'])->name('order-limit');
    Route::get('/subquery', [QueryBuilderController::class, 'subqueryData'])->name('subquery');
    Route::get('/raw', [QueryBuilderController::class, 'rawData'])->name('raw');
});

// Acara 18 - Eloquent ORM
Route::get('/eloquent-users', [UserController::class, 'index']);
Route::post('/eloquent-users/store', [UserController::class, 'store']);
Route::post('/eloquent-users/update/{id}', [UserController::class, 'update']);
Route::post('/eloquent-users/delete/{id}', [UserController::class, 'destroy']);

// Acara 19 - Eloquent ORM Part 2
Route::get('/eloquent', [EloquentController::class, 'index']);

// Soft Deletes
Route::get('/eloquent/delete/{id}', function ($id) {
    $user = \App\Models\User::findOrFail($id);
    $user->delete();

    return redirect('/eloquent');
});

Route::get('/eloquent/restore/{id}', function ($id) {
    $user = \App\Models\User::withTrashed()->findOrFail($id);
    $user->restore();

    return redirect('/eloquent');
});