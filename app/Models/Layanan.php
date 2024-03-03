<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $fillable = [
        'nama_layanan',
        'harga',
        'durasi',
        'deskripsi',
        'gambar',
    ];
    
    public function terapis()
    {
        return $this->hasMany(Terapis::class, 'id_layanan', 'id');
    }

    public function detail_pemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'layanan_id');
    }
}
