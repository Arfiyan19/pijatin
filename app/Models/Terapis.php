<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terapis extends Model
{
    use HasFactory;
    protected $table = 'terapis';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'no_hp',
        'foto',
        'nik',
        'foto_ktp',
        'foto_skck',
        'status',
        'tanggal_lahir',
        'tempat_lahir',
        'user_id',
        'id_layanan',
    ];
    // relasi user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // relasi layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id');
    }
    //relasi ke detail_layanan
    public function detail_layanan()
    {
        return $this->hasMany(DetailLayanan::class, 'id_terapis', 'id');
    }
    // relasi bank account
    public function bankAccount()
    {
        return $this->hasMany(BankAccount::class, 'user_id', 'user_id');
    }
    public function alamat()
    {
        return $this->HasMany(Alamat::class, 'user_id', 'id');
    }
    public function saldo()
    {
        return $this->hasOne(Saldo::class, 'terapis_id', 'id');
    }
    public function pemesanan1()
    {
        return $this->hasMany(Pemesanan::class, 'terapis_id_1', 'id');
    }
    public function pemesanan2()
    {
        return $this->hasMany(Pemesanan::class, 'terapis_id_2', 'id');
    }
    public function pemesanan3()
    {
        return $this->hasMany(Pemesanan::class, 'terapis_id_3', 'id');
    }
}
