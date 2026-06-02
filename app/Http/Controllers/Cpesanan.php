<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mpesanan;
use Illuminate\Support\Facades\DB;

class Cpesanan extends Controller
{
    public function index() {
        $pesanan =  DB::table("Pesanan")
        ->leftJoin("Barang", "Pesanan.id_barang", "=", "Barang.id")
        ->leftJoin("Pembeli", "Pesanan.id_pelanggan", "=", "Pembeli.id")
        ->select("Pesanan.*", "Barang.nama as nama_barang", "Barang.varian", "Pembeli.nama as nama_pembeli")
        ->get();

        return view("pesanan.index", compact("pesanan"));
    }

    public function add() {
        $barang = DB::table('Barang')->get();
        $pembeli = DB::table('Pembeli')->get();
        return view("pesanan.add", compact("barang", "pembeli"));
    }

    public function save(Request $request) {
        $pesanan = new Mpesanan();

        $pesanan->id_pesanan = $request->id_pesanan;
        $pesanan->id_pelanggan = $request->id_pembeli;
        $pesanan->id_barang = $request->id_barang;
        $pesanan->qty = $request->qty;
        $pesanan->tgl_pesan = $request->tgl_pesan;
        $pesanan->save();

        return redirect()->route("pesanan.index")->with('save', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Saved', 'icon' => 'success']);
    }

    public function edit(int $id_pesanan) {
        $pesanan = Mpesanan::where('id_pesanan', $id_pesanan)->first();
        $barang = DB::table('Barang')->get();
        $pembeli = DB::table('Pembeli')->get();
        return view('pesanan.edit', compact('pesanan', 'barang', 'pembeli'));
    }

    public function update(Request $request, int $id_pesanan) {
        $pesanan = Mpesanan::where("id_pesanan", $id_pesanan)->first();

        if ($pesanan) {
            $pesanan->id_pelanggan = $request->id_pembeli;
            $pesanan->id_barang = $request->id_barang;
            $pesanan->qty = $request->qty;
            $pesanan->tgl_pesan = $request->tgl_pesan;

            $pesanan->save();
        }
        return redirect()->route("pesanan.index")->with('update', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Updated', 'icon' => 'success']);
    }

    public function delete(int $id_pesanan) {
        $pesanan = Mpesanan::where("id_pesanan", $id_pesanan)->first();
        $pesanan->delete();

        return redirect()->route("pesanan.index")->with('delete', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Deleted', 'icon' => 'success']);
    }
}
