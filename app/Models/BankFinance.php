<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankFinance extends Model
{
    use HasFactory;
    protected $table = 'bank_finances';
    protected $fillable = ['logo', 'no_rek', 'bank', 'nama_pemilik'];
}
