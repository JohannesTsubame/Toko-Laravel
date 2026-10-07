<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cmhs3 extends Controller
{
    public function index() {
        $response = Http::get(
            "https://pbp.stmikbanjarbaru.com/api/mhs3",
            ["token" => "123456"]
        );

        if ($response -> successful()) {
            $data = $response->json();
        } else {
            $data = [];
        }

        return view("mhs3.index", compact("data"));
    }
}
