<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLayanan extends Model
{
    use HasFactory;

    protected $table = 'table_detail_layanan';

    protected $fillable = [
        'id_terapis',
        'id_layanan',
    ];

    public function terapis()
    {
        return $this->belongsTo(Terapis::class, 'id_terapis', 'id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id');
    }
}
