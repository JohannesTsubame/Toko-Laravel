<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Ctest extends Controller
{
    public function index() {
        $response = Http::get("https://pbp.stmikbanjarbaru.com/api/mhs");
        $data = $response->json("data", []);
        return view("test.index", compact("data"));
    }

    public function index2() {
        $response = Http::get("https://pbp.stmikbanjarbaru.com/api/mhs2");
        $data = $response->json();
        return view("test.index2", compact("data"));
    }

    public function index3() {
        $response = Http::get(
            "https://pbp.stmikbanjarbaru.com/api/mhs3",
            ["token" => "123456"]
        );

        if ($response -> successful()) {
            $data = $response->json();
        } else {
            $data = [];
        }

        return view("test.index3", compact("data"));
    }  

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

        return view('test.index5', compact('data'));
    }  

    public function index5v2 (Request $request) {
        $apiKey = $request->header('X-API-KEY');
        $validApiKey = '123456';

        if (!$apiKey || $apiKey !== $validApiKey) {
            return response()->json([
                'status' => 'error',
                'message' => 'API Key tidak valid atau tidak ditemukan'
            ], 401, [], JSON_PRETTY_PRINT);
        }

        $response = Http::get(
            "https://pbp.stmikbanjarbaru.com/api/mhs2"
        );
        $data = $response->json();
        return view("test.index2", compact("data"));
    }

    public function index_perpus() {
        $response = Http::get("https://pbp.stmikbanjarbaru.com/api/mhs");
        $data = $response->json("data", []);
        return view("test.index", compact("data"));
    }
}
