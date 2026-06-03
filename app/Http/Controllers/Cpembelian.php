<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mpembelian;
use Illuminate\Support\Facades\DB;

class Cpembelian extends Controller
{
    public function index() {
        $pembelian = DB::table("Pembelian")
        ->leftJoin("Barang", "Pembelian.id_barang", "=", "Barang.id")
        ->leftJoin("Supplier", "Pembelian.id_supplier", "=", "Supplier.id")
        ->select("Pembelian.*", "Barang.nama as nama_barang", "Barang.varian", "Supplier.nama as nama_supplier")
        ->orderBy("id_pembelian")
        ->get();

        return view("pembelian.index", compact("pembelian"));
    }

    public function add() {
        $barang = DB::table("Barang")->get();
        $supplier = DB::table("Supplier")->get();
        return view("pembelian.add", compact("barang", "supplier"));
    }

    public function save(Request $request) {
        $pembelian = new Mpembelian();

        $pembelian->id_pembelian = $request->id_pembelian;
        $pembelian->id_barang = $request->id_barang;
        $pembelian->id_supplier = $request->id_supplier;
        $pembelian->qty = $request->qty;
        $pembelian->tgl = $request->tgl;

        $pembelian->save();

        return redirect()->route("pembelian.index")->with('save', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Saved', 'icon' => 'success']);
    }

    public function edit(int $id_pembelian) {
        $pembelian =  Mpembelian::where("id_pembelian", $id_pembelian)->first();
        $barang = DB::table("Barang")->get();
        $supplier = DB::table("Supplier")->get();

        return view("pembelian.edit", compact("pembelian", "barang", "supplier"));
    }

    public function update(Request $request, int $id_pembelian) {
        $pembelian =  Mpembelian::where("id_pembelian", $id_pembelian)->first();
        
        // $pembelian->update([
        //     $pembelian->id_pembelian = $request->id_pembelian,
        //     $pembelian->id_barang = $request->id_barang,
        //     $pembelian->id_supplier = $request->id_supplier,
        //     $pembelian->qty = $request->qty,                                                
        //     $pembelian->tgl = $request->tgl,
        // ]);
        
        if($pembelian) {
            $pembelian->id_pembelian = $request->id_pembelian;
            $pembelian->id_barang = $request->id_barang;
            $pembelian->id_supplier = $request->id_supplier;
            $pembelian->qty = $request->qty;                                                
            $pembelian->tgl = $request->tgl;

            $pembelian->save();
        }

        return redirect()->route("pembelian.index")->with('update', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Updated', 'icon' => 'success']);
    }

    public function delete(int $id_pembelian) {
        $pembelian =  Mpembelian::where("id_pembelian", $id_pembelian)->first();                                                                                                                                                        
        $pembelian->delete();

        return redirect()->route("pembelian.index")->with('delete', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Deleted', 'icon' => 'success']);
    }

     public function print_data() {
        $pembelian = DB::table("Pembelian")
        ->leftJoin("Barang", "Pembelian.id_barang", "=", "Barang.id")
        ->leftJoin("Supplier", "Pembelian.id_supplier", "=", "Supplier.id")
        ->select("Pembelian.*", "Barang.nama as nama_barang", "Barang.varian", "Supplier.nama as nama_supplier")
        ->orderBy("id_pembelian")
        ->get();

        return view("pembelian.print_data", compact("pembelian"));
    }

    public function export() {
        
        $pembelian = DB::table("Pembelian")
        ->leftJoin("Barang", "Pembelian.id_barang", "=", "Barang.id")
        ->leftJoin("Supplier", "Pembelian.id_supplier", "=", "Supplier.id")
        ->select("Pembelian.*", "Barang.nama as nama_barang", "Barang.varian", "Supplier.nama as nama_supplier")
        ->orderBy("id_pembelian")
        ->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=pembelian_310124023844.xlsx");

        return view('pembelian.export', compact('pembelian'));
    }

}
