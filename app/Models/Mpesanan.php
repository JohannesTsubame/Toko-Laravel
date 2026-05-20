<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mpesanan extends Model
{
    protected $table = "Pesanan";
    protected $fillable = ["id_pesanan", "id_pelanggan", "id_barang", "qty", "tgl_pesan"];
}
