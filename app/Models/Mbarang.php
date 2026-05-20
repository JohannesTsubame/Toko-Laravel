<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mbarang extends Model
{
    protected $table = "Barang";
    protected $fillable = ["id_barang", "nama", "varian", "harga_beli", "harga_jual"];
}
