<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profils';
    protected $fillable = ['nama_lengkap', 'jenis_kelamin', 'alamat', 'no_hp', 'foto', 'ktp', 'user_id', 'status', 'tempat_lahir', 'tanggal_lahir', 'nik_ktp'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
