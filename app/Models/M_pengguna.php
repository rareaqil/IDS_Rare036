<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_pengguna extends Model
{
    protected $table = "pengguna";

    protected $fillable = [
        'id_customer',
        'nama',
        'alamat',
        'kodepos'
    ];
}
