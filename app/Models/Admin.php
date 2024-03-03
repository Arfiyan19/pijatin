<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $fillable = ['nama', 'jenis_kelamin', 'no_hp', 'foto', 'nik', 'user_id', 'status', 'tempat_lahir', 'tanggal_lahir', 'foto_ktp'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
