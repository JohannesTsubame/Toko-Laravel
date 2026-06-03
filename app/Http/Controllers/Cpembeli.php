<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mpembeli;
use Illuminate\Support\Facades\DB;

class Cpembeli extends Controller
{
    public function index() {
        $pembeli = DB::table("Pembeli")
        ->select("Pembeli.*")
        ->orderby("id_pembeli")
        ->get();

        return view("pembeli.index", compact("pembeli"));
    }

    public function add() {
        return view("pembeli.add");
    }

    public function save(Request $request) {
        $request->validate([
            "id_pembeli" => "unique:Pembeli,id_pembeli|max:6",
            "nama" => "string|min:3|regex:/^[\pL\s]+$/u",
            "kode_pos" => "max:5|regex:/^[0-9]+$/"
        ],
        [
            "id_pembeli.unique" => "ID Pembeli Sudah Ada",
            "id_pembeli.max" => "ID Pembeli Maksimal 6 Karakter",
            "nama.min" => "Nama Minimal 3 Karakter",
            "nama.regex" => "Nama Hanya Boleh Alfabet atau Spasi",
            "kode_pos.max" => "Kode Pos Maksimal 5 Karakter",
            "kode_pos.regex" => "Kode Pos Hanya Boleh Angka"
        ]);
        
        $pembeli = new Mpembeli();
        $pembeli->id_pembeli = $request->id_pembeli;
        $pembeli->nama = $request->nama;
        $pembeli->jns_kelamin = $request->jns_kelamin;
        $pembeli->alamat = $request->alamat;
        $pembeli->kode_pos = $request->kode_pos;
        $pembeli->kota = $request->kota;
        $pembeli->tgl_lahir = $request->tgl_lahir;
        $pembeli->save();

        return redirect()->route("pembeli.index")->with('save', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Saved', 'icon' => 'success']);
    }

    public function edit($id) {
        $pembeli = Mpembeli::FindOrFail($id);
        return view("pembeli.edit", compact("pembeli"));
    }

    public function update(Request $request, $id) {
        $pembeli = Mpembeli::FindOrFail($id);

        $request->validate([
            "id_pembeli" => "max:6|unique:Pembeli,id_pembeli," . $pembeli->id,
            "nama" => "string|min:3|regex:/^[\pL\s]+$/u",
            "kode_pos" => "max:5|regex:/^[0-9]+$/"
        ],
        [
            "id_pembeli.unique" => "ID Pembeli Sudah Ada",
            "id_pembeli.max" => "ID Pembeli Maksimal 6 Karakter",
            "nama.min" => "Nama Minimal 3 Karakter",
            "nama.regex" => "Nama Hanya Boleh Alfabet atau Spasi",
            "kode_pos.max" => "Kode Pos Maksimal 5 Karakter",
            "kode_pos.regex" => "Kode Pos Hanya Boleh Angka"
        ]);

        $pembeli->id_pembeli = $request->id_pembeli;
        $pembeli->nama = $request->nama;
        $pembeli->jns_kelamin = $request->jns_kelamin;
        $pembeli->alamat = $request->alamat;
        $pembeli->kode_pos = $request->kode_pos;
        $pembeli->kota = $request->kota;
        $pembeli->tgl_lahir = $request->tgl_lahir;
        $pembeli->save();

        return redirect()->route("pembeli.index")->with('update', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Updated', 'icon' => 'success']);
    }

    public function delete($id) {
        $pembeli = Mpembeli::FindOrFail($id);
        $pembeli->delete();
        
        return redirect()->route('pembeli.index')->with('delete', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Deleted', 'icon' => 'success']);
    }

     public function print_data() {
        $pembeli = DB::table("Pembeli")
        ->select("Pembeli.*")
        ->orderBy("id_pembeli")
        ->get();

        return view("pembeli.print_data", compact("pembeli"));
    }

    public function export() {
        
        $pembeli = DB::table("Pembeli")
        ->select("Pembeli.*")
        ->orderBy("id_pembeli")
        ->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=pembeli_310124023844.xlsx");

        return view('pembeli.export', compact('pembeli'));
    }

}
