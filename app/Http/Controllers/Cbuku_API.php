<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cbuku_API extends Controller
{
    public function index() {
        $response = Http::withHeaders([
            'X-API-KEY' => '123456',
        ])->get('http://127.0.0.1:8001/api/buku5');

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
}
