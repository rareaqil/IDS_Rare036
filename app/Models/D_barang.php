<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D_barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'id_barang',
        'nama',
        'timestamp'
    ];
}
