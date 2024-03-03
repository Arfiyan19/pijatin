<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'name',
        'email',
        'password',
        'role',
        'activation_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // relasi customers
    public function customers()
    {
        return $this->hasOne(Customers::class, 'user_id', 'id');
    }
    //superadmin
    public function superadmin()
    {
        return $this->hasOne(SuperAdmin::class, 'user_id', 'id');
    }
    //terapis
    public function terapis()
    {
        return $this->hasOne(Terapis::class, 'user_id', 'id');
    }
    //terapis where.status
    public function terapisWhereStatus()
    {
        return $this->hasOne(Terapis::class, 'user_id', 'id')->where('status', '!=', 'aktif');
    }
    //customer where.status
    public function customersWhereStatus()
    {
        return $this->hasOne(Customers::class, 'user_id', 'id')->where('status', '!=', 'aktif');
    }

    //finance
    public function finance()
    {
        return $this->hasOne(Finance::class, 'user_id', 'id');
    }
    public function admins()
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }
    //alamat
    public function alamat()
    {
        return $this->HasMany(Alamat::class, 'user_id', 'id');
    }
    //hasmany bank
    public function bank()
    {
        return $this->HasMany(Bank::class, 'user_id', 'id');
    }
    
     // relasi bank account
    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class, 'user_id', 'id');
    }
}
