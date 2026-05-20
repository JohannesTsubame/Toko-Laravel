<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cdashboard;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Cpembeli;
use App\Http\Controllers\Csupplier;
use App\Http\Controllers\Cpesanan;
use App\Http\Controllers\Cpembelian;    

Route::get('/', function () {
    return view('dashboard');
})->name("dashboard");

Route::get("/barang", [Cbarang::class, "index"])->name("barang.index");
Route::get("/barang/add", [Cbarang::class, "add"])->name("barang.add");
Route::post("/barang/save", [Cbarang::class, "save"])->name("barang.save");
Route::get("/barang/{id}/edit", [Cbarang::class, "edit"])->name("barang.edit");
Route::put("/barang/{id}/update", [Cbarang::class, "update"])->name("barang.update");
Route::delete("/barang/{id}/delete", [Cbarang::class, "delete"])->name("barang.delete");

Route::get("/pembeli", [Cpembeli::class, "index"])->name("pembeli.index");
Route::get("/pembeli/add", [Cpembeli::class, "add"])->name("pembeli.add");
Route::post("/pembeli/save", [Cpembeli::class, "save"])->name("pembeli.save");
Route::get("/pembeli/{id}/edit", [Cpembeli::class, "edit"])->name("pembeli.edit");
Route::put("/pembeli/{id}/update", [Cpembeli::class, "update"])->name("pembeli.update");
Route::delete("/pembeli/{id}/delete", [Cpembeli::class, "delete"])->name("pembeli.delete");

Route::get("/pembelian", [Cpembelian::class, "index"])->name("pembelian.index");
Route::get("/pembelian/add", [Cpembelian::class, "add"])->name("pembelian.add");
Route::post("/pembelian/save", [Cpembelian::class, "save"])->name("pembelian.save");
Route::get("/pembelian/{id_pembelian}/edit", [Cpembelian::class, "edit"])->name("pembelian.edit");
Route::put("/pembelian/{id_pembelian}/update", [Cpembelian::class, "update"])->name("pembelian.update");
Route::delete("/pembelian/{id_pembelian}/delete", [Cpembelian::class, "delete"])->name("pembelian.delete");

Route::get("/pesanan", [Cpesanan::class, "index"])->name("pesanan.index");
Route::get("/pesanan/add", [Cpesanan::class, "add"])->name("pesanan.add");
Route::post("/pesanan/save", [Cpesanan::class, "save"])->name("pesanan.save");
Route::get("/pesanan/{id_pesanan}/edit", [Cpesanan::class, "edit"])->name("pesanan.edit");
Route::put("/pesanan/{id_pesanan}/update)", [Cpesanan::class, "update"])->name("pesanan.update");
Route::delete("/pesanan/{id_pesanan}/delete", [Cpesanan::class, "delete"])->name("pesanan.delete");

Route::get("/supplier", [Csupplier::class, "index"])->name("supplier.index");
Route::get("/supplier/add", [Csupplier::class, "add"])->name("supplier.add");
Route::post("/supplier/save", [Csupplier::class, "save"])->name("supplier.save");
Route::get("/supplier/{id}/edit", [Csupplier::class, "edit"])->name("supplier.edit");
Route::put("/supplier/{id}/update", [Csupplier::class, "update"])->name("supplier.update");
Route::delete("/supplier/{id}/delete", [Csupplier::class, "delete"])->name("supplier.delete");




