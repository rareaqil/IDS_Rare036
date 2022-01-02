<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D_Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'id_customer',
        'nama',
        'alamat',
        'id_kelurahan'
    ];
}
