<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;

    protected $table = 'saldo';

    protected $fillable = [
        'terapis_id',
        'saldo',
    ];

    public function deposit()
    {
        return $this->hasMany(Deposit::class, 'terapis_id', 'terapis_id');
    }
    public function withdrawal()
    {
        return $this->hasMany(Withdrawal::class, 'terapis_id', 'terapis_id');
    }
}
