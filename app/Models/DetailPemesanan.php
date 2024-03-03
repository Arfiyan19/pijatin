<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan_detail';
    protected $fillable = [
        'pemesanan_id',
        'layanan_id',
        'layanan_tambahan_1',
        'layanan_tambahan_2',
        'layanan_tambahan_3',
        'harga',
        'jumlah',
        'subtotal',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
    
    public function layananExtra1()
    {
        return $this->belongsTo(Layanan::class, 'layanan_tambahan_1');
    }
    public function layananExtra2()
    {
        return $this->belongsTo(Layanan::class, 'layanan_tambahan_2');
    }
    public function layananExtra3()
    {
        return $this->belongsTo(Layanan::class, 'layanan_tambahan_3');
    }
}
