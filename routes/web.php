<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Cdashboard;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Cpembeli;
use App\Http\Controllers\Csupplier;
use App\Http\Controllers\Cpesanan;
use App\Http\Controllers\Cpembelian;  
use App\Http\Controllers\Cbuku_API;
use App\Http\Controllers\Cgames;
use App\Http\Controllers\Cmhs1;
use App\Http\Controllers\Cmhs2;
use App\Http\Controllers\Cmhs3;
use App\Http\Controllers\Cmhs4;
use App\Http\Controllers\Cmhs5;

Route::middleware("guest")->group(function() {
    Route::get("/login", [Clogin::class, 'index'])->name('login');
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
});

Route::middleware("auth")->group(function() {
    Route::get('/', function () {
        return view('dashboard');
    })->name("dashboard");
        
    Route::get("/barang", [Cbarang::class, "index"])->name("barang.index");
    Route::get("/barang/add", [Cbarang::class, "add"])->name("barang.add");
    Route::post("/barang/save", [Cbarang::class, "save"])->name("barang.save");
    Route::get("/barang/{id_barang}/edit", [Cbarang::class, "edit"])->name("barang.edit");
    Route::put("/barang/{id_barang}/update", [Cbarang::class, "update"])->name("barang.update");
    Route::delete("/barang/{id_barang}/delete", [Cbarang::class, "delete"])->name("barang.delete"); 
    Route::get('/barang/print_data', [Cbarang::class, 'print_data'])->name('barang.print_data');
    Route::get('/barang/export', [Cbarang::class, 'export'])->name('barang.export');

    Route::get("/pembeli", [Cpembeli::class, "index"])->name("pembeli.index");
    Route::get("/pembeli/add", [Cpembeli::class, "add"])->name("pembeli.add");
    Route::post("/pembeli/save", [Cpembeli::class, "save"])->name("pembeli.save");
    Route::get("/pembeli/{id_pembeli}/edit", [Cpembeli::class, "edit"])->name("pembeli.edit");
    Route::put("/pembeli/{id_pembeli}/update", [Cpembeli::class, "update"])->name("pembeli.update");
    Route::delete("/pembeli/{id_pembeli}/delete", [Cpembeli::class, "delete"])->name("pembeli.delete");
    Route::get('/pembeli/print_data', [Cpembeli::class, 'print_data'])->name('pembeli.print_data');
    Route::get('/pembeli/export', [Cpembeli::class, 'export'])->name('pembeli.export');

    Route::get("/pembelian", [Cpembelian::class, "index"])->name("pembelian.index");
    Route::get("/pembelian/add", [Cpembelian::class, "add"])->name("pembelian.add");
    Route::post("/pembelian/save", [Cpembelian::class, "save"])->name("pembelian.save");
    Route::get("/pembelian/{id_pembelian}/edit", [Cpembelian::class, "edit"])->name("pembelian.edit");
    Route::put("/pembelian/{id_pembelian}/update", [Cpembelian::class, "update"])->name("pembelian.update");
    Route::delete("/pembelian/{id_pembelian}/delete", [Cpembelian::class, "delete"])->name("pembelian.delete");
    Route::get('/pembelian/print_data', [Cpembelian::class, 'print_data'])->name('pembelian.print_data');
    Route::get('/pembelian/export', [Cpembelian::class, 'export'])->name('pembelian.export');

    Route::get("/pesanan", [Cpesanan::class, "index"])->name("pesanan.index");
    Route::get("/pesanan/add", [Cpesanan::class, "add"])->name("pesanan.add");
    Route::post("/pesanan/save", [Cpesanan::class, "save"])->name("pesanan.save");
    Route::get("/pesanan/{id_pesanan}/edit", [Cpesanan::class, "edit"])->name("pesanan.edit");
    Route::put("/pesanan/{id_pesanan}/update", [Cpesanan::class, "update"])->name("pesanan.update");
    Route::delete("/pesanan/{id_pesanan}/delete", [Cpesanan::class, "delete"])->name("pesanan.delete");
    Route::get('/pesanan/print_data', [Cpesanan::class, 'print_data'])->name('pesanan.print_data');
    Route::get('/pesanan/export', [Cpesanan::class, 'export'])->name('pesanan.export');

    Route::get("/supplier", [Csupplier::class, "index"])->name("supplier.index");
    Route::get("/supplier/add", [Csupplier::class, "add"])->name("supplier.add");
    Route::post("/supplier/save", [Csupplier::class, "save"])->name("supplier.save");
    Route::get("/supplier/{id}/edit", [Csupplier::class, "edit"])->name("supplier.edit");
    Route::put("/supplier/{id}/update", [Csupplier::class, "update"])->name("supplier.update");
    Route::delete("/supplier/{id}/delete", [Csupplier::class, "delete"])->name("supplier.delete");
    Route::get('/supplier/print_data', [Csupplier::class, 'print_data'])->name('supplier.print_data');
    Route::get('/supplier/export', [Csupplier::class, 'export'])->name('supplier.export');

    Route::get('/mhs1', [Cmhs1::class, "index"])->name("mhs1.index");
    Route::get("/mhs1/add", [Cmhs1::class, "add"])->name("mhs1.add");
    Route::post("/mhs1/save", [Cmhs1::class, "save"])->name("mhs1.save");

    Route::get('/mhs2', [Cmhs2::class, "index"])->name("mhs2.index");
    Route::get("/mhs2/add", [Cmhs2::class, "add"])->name("mhs2.add");
    Route::post("/mhs2/save", [Cmhs2::class, "save"])->name("mhs2.save");

    // Route::get('/mhs3', [Cmhs3::class, "index"])->name("mhs3.index");
    // Route::get("/mhs3/add", [Cmhs3::class, "add"])->name("mhs3.add");
    // Route::post("/mhs3/save", [Cmhs3::class, "save"])->name("mhs3.save");

    // Route::get('/mhs4', [Cmhs4::class, "index"])->name("mhs4.index");
    // Route::get("/mhs4/add", [Cmhs4::class, "add"])->name("mhs4.add");
    // Route::post("/mhs4/save", [Cmhs4::class, "save"])->name("mhs4.save");

    // Route::get('/mhs5', [Cmhs5::class, "index"])->name("mhs5.index");
    // Route::get("/mhs5/add", [Cmhs5::class, "add"])->name("mhs5.add");
    // Route::post("/mhs5/save", [Cmhs5::class, "save"])->name("mhs5.save");

    Route::get("/buku", [Cbuku_API::class, "index"])->name("buku.index");
    Route::get("/buku/add", [Cbuku_API::class, "add"])->name("buku.add");
    Route::post("/buku/save", [Cbuku_API::class, "save"])->name("buku.save");

    Route::get("/games", [Cgames::class, "index"])->name("games.index");

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});





