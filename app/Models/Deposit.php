<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $table = 'deposits';

    protected $fillable = [
        'terapis_id',
        'jumlah',
        'bukti_transfer',
        'tanggal',
        'status',
    ];

    public function terapis()
    {
        return $this->belongsTo(Terapis::class, 'terapis_id');
    }
}
