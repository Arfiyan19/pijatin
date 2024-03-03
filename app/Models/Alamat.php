<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'table_alamat';
    protected $fillable = [
        'user_id',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'alamat_lengkap',
        'latitude',
        'longitude',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
