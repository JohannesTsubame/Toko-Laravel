<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Msupplier extends Model
{
    protected $table = "Supplier";
    protected $fillable = ["id_supplier", "nama", "alamat", "kode_pos", "kota"];
}
