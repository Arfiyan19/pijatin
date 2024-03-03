<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $table = 'refund';
    protected $fillable = ['pemesanan_id', 'customer_id', 'jumlah', 'bank_accounts', 'status_pemesanan'];

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }

}
