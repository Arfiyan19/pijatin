<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $table = 'withdrawals';

    protected $fillable = [
        'terapis_id',
        'jumlah',
        'tanggal',
        'status',
        'bank_accounts_id'
    ];

    public function terapis()
    {
        return $this->hasOne(Terapis::class, 'id', 'terapis_id');
    }
}
