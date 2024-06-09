<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = [
        'customer_id ',
        'terapis_id_1',
        'terapis_id_2',
        'terapis_id_3',
        'nama_pemesan_1',
        'nama_pemesan_2',
        'nama_pemesan_3',
        'tanggal_pemesanan',
        'tanggal_pembayaran',
        'total_bayar',
        'metode_pembayaran',
        'status_pembayaran',
        'status_pemesanan',
        'catatan',
        'read',
    ];


    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
    //layanan_tambahan
    public function layanan_tambahan()
    {
        //get layanan where jenis layanan = tambahan
        return $this->hasMany(DetailLayanan::class, 'pemesanan_id')->where('jenis_layanan', 'layanan_tambahan');
    }


    public function terapis()
    {
        return $this->belongsTo(Terapis::class, 'terapis_id_1');
    }

    public function terapis2()
    {
        return $this->belongsTo(Terapis::class, 'terapis_id_2');
    }

    public function terapis3()
    {
        return $this->belongsTo(Terapis::class, 'terapis_id_3');
    }
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'pemesanan_id');
    }

    public function pemesanan_detail()
    {
        return $this->hasMany(DetailPemesanan::class, 'pemesanan_id');
    }
}
