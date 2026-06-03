<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mbarang;
use Illuminate\Support\Facades\DB;

class Cbarang extends Controller
{
    public function index() {
        $barang = DB::table("Barang")
        ->select("Barang.*")
        ->orderBy("id_barang")
        ->get();    

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
            "harga_jual" => "integer|min:1000",
            "pic" => "image|max:2048"
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

        $pic = $request->file("pic");
        $filename = null;
        if ($pic) {
            $extension = $pic->getClientOriginalExtension();
            $filename = date("YmdHis") . "." . $extension;
            $pic->move(public_path("uploads/barang_pic"), $filename);
        }

        $barang = new Mbarang();
        $barang->id_barang = $request->id_barang;
        $barang->nama = $request->nama;
        $barang->varian = $request->varian;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->pic = $filename;
        $barang->save();

        return redirect()->route("barang.index")->with('save', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Saved', 'icon' => 'success']);
    }

    public function edit(int $id_barang) {
        $barang = Mbarang::where("id_barang", $id_barang)->first();

        return view("barang.edit", compact("barang"));
    }

    public function update(Request $request, int $id_barang) {

        $barang = Mbarang::where("id_barang", $id_barang)->first();

        $request->validate(
        [
            "id_barang" => "max:6|unique:Barang,id_barang," . $barang->id,
            "nama" => "string|min:3|regex:/^[\pL\s]+$/u",
            "harga_beli" => "integer|min:1000",
            "harga_jual" => "integer|min:1000",
            "pic" => "image|max:2048"
        ], 
        [
            "id_barang.unique" => "ID Barang Sudah Ada",
            "id_barang.max" => "ID Barang Maksimal 6 Karakter",
            "nama.min" => "Nama Minimal 3 Karakter",
            "nama.regex" => "Nama Harus Alfabet atau Spasi",
            "harga_beli.min" => "Harga Beli Minimal Rp 1.000,00",
            "harga_jual.min" => "Harga Jual Minimal Rp 1.000,00"
        ]);

        $pic = $request->file("pic");
        $filename = null;
        if ($pic) {
            $extension = $pic->getClientOriginalExtension();
            $filename = date("YmdHis") . "." . $extension;
            $pic->move(public_path("uploads/barang_pic"), $filename);
        }

        $barang->id_barang = $request->id_barang;
        $barang->nama = $request->nama;
        $barang->varian = $request->varian;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->pic = $filename;
        $barang->save();

        return redirect()->route('barang.index')->with('update', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Updated', 'icon' => 'success']);

    }

    public function delete(int $id_barang) {
        $barang = Mbarang::where("id_barang", $id_barang)->first();
        $barang->delete();
        return redirect()->route('barang.index')->with('delete', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Deleted', 'icon' => 'success']);
    }

    public function print_data() {
        $barang = DB::table("Barang")
        ->select("Barang.*")
        ->orderBy("id_barang")
        ->get();

        return view("barang.print_data", compact("barang"));
    }

    public function export() {
        
        $barang = DB::table("Barang")
        ->select("Barang.*")
        ->orderBy("id_barang")
        ->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Barang_310124023844.xlsx");

        return view('barang.export', compact('barang'));
    }

}