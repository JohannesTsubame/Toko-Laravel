<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Capi;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('barang1', [Capi::class, 'barang1']);
Route::get('barang2', [Capi::class, 'barang2']);
Route::get('barang3', [Capi::class, 'barang3']);
Route::get('barang4', [Capi::class, 'barang4']);
Route::get('barang5', [Capi::class, 'barang5']);
Route::get('barang_by_id/{id}', [Capi::class, 'barang_by_id']);

