<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $table = 'finances';
    protected $fillable = ['nama', 'jenis_kelamin', 'no_hp', 'foto',  'nik', 'foto_ktp', 'user_id', 'status', 'tempat_lahir', 'tanggal_lahir'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}