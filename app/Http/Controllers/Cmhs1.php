<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cmhs1 extends Controller
{
    public function index() {
        $response = Http::get("https://pbp.stmikbanjarbaru.com/api/mhs");
        $data = $response->json("data", []);
        return view("mhs1.index", compact("data"));
    }

    public function add() {
        return view('mhs1.add');
    }
    
    public function save(Request $request) {
        $response = Http::post(
            'https://pbp.stmikbanjarbaru.com/api/mhs',
            [
                'nim'           => $request->nim,
                'nama'          => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'telpon'        => $request->telpon,
                'prodi'         => $request->prodi,
                'kelas'         => $request->kelas
            ]
        );

        if ($response->successful()) {
            return redirect()
                ->route('mhs1.index')
                ->with('success', 'Data successfully added');
        }

        return back()
            ->withInput()
            ->with('error', $response->json('message', 'Gagal menyimpan data'));
    }
}
