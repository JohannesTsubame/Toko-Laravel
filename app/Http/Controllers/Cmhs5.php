<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cmhs5 extends Controller
{
    public function index5(Request $request) {
        $response = Http::withHeaders([
            'X-API-KEY' => '123456',
        ])->get('https://pbp.stmikbanjarbaru.com/api/mhs5');

        if ($response->successful()) {
            $data = $response->json();
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'API Key tidak valid atau tidak ditemukan'
            ], 401, [], JSON_PRETTY_PRINT);
        }

        return view('mhs5.index', compact('data'));
    }
}
