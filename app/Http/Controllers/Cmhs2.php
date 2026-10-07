<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cmhs2 extends Controller
{
    public function add() {
        return view('mhs_api.add');
    }
    
    public function save(Request $request) {
        $response = Http::post(
            'https://pbp.stmikbanjarbaru.com/api/mhs2',
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
                ->route('test.index2')
                ->with('success', 'Data successfully added');
        }

        return back()
            ->withInput()
            ->with('error', $response->json('message', 'Gagal menyimpan data'));
    }
}
