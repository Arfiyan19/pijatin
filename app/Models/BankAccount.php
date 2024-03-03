<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $table = 'bank_accounts';

    protected $fillable = [
        'user_id',
        'nomor_rekening',
        'nama_bank',
        'nama_pemilik',
    ];

    // create relasi with terapis
    public function terapis()
    {
        return $this->belongsTo(Terapis::class, 'terapis_id', 'id');
    }
}
