<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'tabel_cabang';
    protected $fillable = [
        'kota',
        'provinsi',
        'tanggal_berdiri',
        'status',
        'email'
    ];
}
