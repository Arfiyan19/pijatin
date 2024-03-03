<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    // table customers
    protected $table = 'customers';
    protected $fillable = ['nama', 'jenis_kelamin', 'no_hp', 'foto',  'nik', 'foto_ktp', 'user_id', 'status', 'tempat_lahir', 'tanggal_lahir'];
    // relasi dengan order
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'customer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // relasi bank account
    public function bankAccount()
    {
        return $this->hasMany(BankAccount::class, 'user_id', 'user_id');
    }
}
