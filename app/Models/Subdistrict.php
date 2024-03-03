<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;
    protected $table = 'subdistrict';
    protected $fillable = [
        'subdistrictId',
        'subdistrictName',
        'postalCode',
        'districtId',
        'cityId',
        'provinceId',
    ];
}