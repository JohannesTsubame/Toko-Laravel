<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Msupplier;

class Csupplier extends Controller
{
    public function index() {
        $supplier = Msupplier::all();
        return view("supplier.index", compact("supplier"));
    }

    public function add() {
        return view("supplier.add");
    }

    public function save(Request $request) {

        $request->validate([
            "id_supplier" => "max:6|required|unique:Supplier,id_supplier",
            "nama" => "string|min:3|regex:/^[\pL\s]+$/u",
            "kode_pos" => "min:5|regex:/^[0-9]+$/"
        ], 
        [
            "id_supplier.max" => "ID Supplier Maksimal 6 Karakter",
            "id_pembeli.unique" => "ID Supplier Sudah Ada",
            "nama.min" => "Nama Minimal 3 Karakter",
            "nama.regex" => "Nama Hanya Boleh Alfabet atau Spasi",
            "kode_pos.max" => "Kode Pos Maksimal 5 Karakter",
            "kode_pos.regex" => "Kode Pos Hanya Boleh Angka"
        ]);

        $supplier = new Msupplier();
        $supplier->id_supplier = $request->id_supplier;
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->kode_pos = $request->kode_pos;
        $supplier->kota = $request->kota;
        $supplier->save();

        return redirect()->route("supplier.index")->with("Sukses");
    }

    public function edit($id) {
        $supplier = Msupplier::FindOrFail($id);
        return view("supplier.edit", compact("supplier"));
    }

    public function update(Request $request, $id) {
        $supplier = Msupplier::FindOrFail($id);

        // $request->validate([
        //     "id_supplier" => "max:6|required|unique:Supplier,id_supplier," . $supplier->id,
        //     "nama" => "string|min:3|regex:/^[\pL\s]+$/u",
        // ]);

        $request->validate([
            "id_supplier" => "max:6|required|unique:Supplier,id_supplier," . $supplier->id,
            "nama" => "string|min:3|regex:/^[\pL\s]+$/u",
            "kode_pos" => "min:5|regex:/^[0-9]+$/"
        ], 
        [
            "id_supplier.max" => "ID Supplier Maksimal 6 Karakter",
            "id_pembeli.unique" => "ID Supplier Sudah Ada",
            "nama.min" => "Nama Minimal 3 Karakter",
            "nama.regex" => "Nama Hanya Boleh Alfabet atau Spasi",
            "kode_pos.max" => "Kode Pos Maksimal 5 Karakter",
            "kode_pos.regex" => "Kode Pos Hanya Boleh Angka"
        ]);

        $supplier->id_supplier = $request->id_supplier;
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->kode_pos = $request->kode_pos;
        $supplier->kota = $request->kota;
        $supplier->save();

        return redirect()->route("supplier.index")->with("Sukses");
    }

    public function delete($id) {
        $supplier = Msupplier::FindOrFail($id);
        $supplier->delete();

        return redirect()->route("supplier.index")->with("Sukses");
    }
}
