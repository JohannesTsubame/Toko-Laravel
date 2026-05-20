<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mbarang;

class Cbarang extends Controller
{
    public function index() {
        $barang = Mbarang::all();
        return view("barang.index", compact("barang"));
    }

    public function add() {
        return view("barang.add");
    }

    public function save(Request $request) {
        $request->validate(
        [
            "id_barang" => "unique:Barang,id_barang|max:6",
            "nama" => "string|min:3|regex:/^[\pL\s]+$/u",
            "harga_beli" => "integer|min:1000",
            "harga_jual" => "integer|min:1000"
        ],
        [
            "id_barang.unique" => "ID Barang Sudah Ada",
            "id_barang.max" => "ID Barang Maksimal 6 Karakter",
            "nama.min" => "Nama Minimal 3 Karakter",
            "nama.regex" => "Nama Harus Alfabet atau Spasi",
            "harga_beli.min" => "Harga Beli Minimal Rp 1.000,00",
            "harga_jual.min" => "Harga Jual Minimal Rp 1.000,00"
        ]
        );

        $barang = new Mbarang();
        $barang->id_barang = $request->id_barang;
        $barang->nama = $request->nama;
        $barang->varian = $request->varian;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->save();

        return redirect()->route("barang.index")->with("Sukses");
    }

    public function edit(int $id) {
        $barang = Mbarang::FindOrFail($id);
        return view("barang.edit", compact("barang"));
    }

    public function update(Request $request, int $id) {

        $barang = Mbarang::FindorFail($id); 

        $request->validate(
        [
            "id_barang" => "max:6|unique:Barang,id_barang," . $barang->id,
            "nama" => "string|min:3|regex:/^[\pL\s]+$/u",
            "harga_beli" => "integer|min:1000",
            "harga_jual" => "integer|min:1000"
        ], 
        [
            "id_barang.unique" => "ID Barang Sudah Ada",
            "id_barang.max" => "ID Barang Maksimal 6 Karakter",
            "nama.min" => "Nama Minimal 3 Karakter",
            "nama.regex" => "Nama Harus Alfabet atau Spasi",
            "harga_beli.min" => "Harga Beli Minimal Rp 1.000,00",
            "harga_jual.min" => "Harga Jual Minimal Rp 1.000,00"
        ]);

        $barang->id_barang = $request->id_barang;
        $barang->nama = $request->nama;
        $barang->varian = $request->varian;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->save();

        return redirect()->route('barang.index')->with('Sukses', 'Berhasil tersimpan');

    }

    public function delete(int $id) {
        $barang = Mbarang::FindOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil dihapus');
    }
}