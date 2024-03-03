<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // table
    protected $table = 'order';

    // filable
    protected $fillable = [
        'customer_id',
        'layanan',
        'tanggal_pemesanan',
        'tanggal_kembali',
        'status',
    ];

    // relasi dengan customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
