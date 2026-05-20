<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mpembelian extends Model
{
    protected $table = "Pembelian";
    protected $fillable = [
        "id_pembelian",
        "id_barang",
        "id_supplier",
        "qty",
        "tgl"
    ];
}
