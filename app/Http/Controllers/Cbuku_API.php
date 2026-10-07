<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cbuku_API extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'X-API-KEY' => '123456',
        ])->get('http://127.0.0.1:8000/api/buku5');

        if ($response->successful()) {
            $data = $response->json();
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'API Key tidak valid atau tidak ditemukan'
            ], 401, [], JSON_PRETTY_PRINT);
        }

        return view('buku.index', compact('data'));
    }

    public function add()
    {
        $response = Http::get("http://127.0.0.1:8000/api/buku5/add");
        $data = $response->json();
        return view("buku.add", compact("data"));
    }

    public function save(Request $request)
    {
        $response = Http::post(
            'http://127.0.0.1:8000/api/buku5/store',
            [
                'kode_buku' => $request->kode_buku,
                'judul'  => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn,
                'jumlah_total' => $request->jumlah_total,
                'jumlah_tersedia' => $request->jumlah_tersedia,
                'kategori_id' => $request->kategori_id,
            ]
        );

        if ($response->successful()) {
            return redirect()
                ->route('buku.index')
                ->with('success', 'Data successfully added');
        }

        // return back()
        //     ->withInput()
        //     ->with('error', $response->json('message', 'Gagal menyimpan data'));
        // dd($response->status(), $response->json());
        dd(
            $response->status(),
            $response->headers(),
            $response->body()
        );
    }
}
