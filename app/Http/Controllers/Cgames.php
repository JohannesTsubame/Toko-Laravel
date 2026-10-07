<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cgames extends Controller
{
    public function index() {
        $response = Http::get("https://pbp-api.fastapicloud.dev/api/games_database");
        $data = $response->json();
        return view("games.index", compact("data"));
    }
}
