<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mpembeli extends Model
{
    protected $table = "Pembeli";
    protected $fillable = ["id_pembeli", "nama", "jns_kelamin", "alamat", "kode_pos", "kota", 
    "tgl_lahir", "pic"];
}
