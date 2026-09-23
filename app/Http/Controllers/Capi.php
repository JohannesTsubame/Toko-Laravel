<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mbarang;

class Capi extends Controller
{
    public function barang1() {
        $data = Mbarang::get();
        return response()->json([
            'status' => 'success',
            'message' => 'Item list succesfullly retrieved',
            'data'    => $data,
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function barang2()
    {
        $data = Mbarang::get();
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function barang3(Request $request) {
        $token = $request->query('token');
        $validToken = '123456';

        if (!$token || $token !== $validToken) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token invalid or not found'
            ], 401, [], JSON_PRETTY_PRINT);
        }

        $data = Mbarang::get();
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function barang4(Request $request) {
        $token = $request->bearerToken();
        $validToken = '123456';

        if (!$token || $token !== $validToken) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token invalid or not found'
            ], 401, [], JSON_PRETTY_PRINT);
        }

        $data = Mbarang::get();
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function barang5(Request $request){
        $apiKey = $request->header('X-API-KEY');
        $validApiKey = '123456';

        if (!$apiKey || $apiKey !== $validApiKey) {
            return response()->json([
                'status' => 'error',
                'message' => 'API Key invalid or not found'
            ], 401, [], JSON_PRETTY_PRINT);
        }

        $data = Mbarang::get();
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function barang_by_id(string $id_barang) {
        $data = Mbarang::where('id_barang', $id_barang)->first();
        if (!$data) {
            return response()->json([
                'message' => 'No item find with that id'
            ], 404, [], JSON_PRETTY_PRINT);
        }
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

}
