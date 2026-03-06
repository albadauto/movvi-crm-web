<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Billable;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'plans_id',
        'remember_token'
    ];

    public function plans(){
        return $this->belongsTo(Plans::class);
    }
    public function premiumUsers(){
        return $this->hasOne(PremiumUsers::class);
    }

    public function purchaseHistory(){
        return $this->hasMany(PurchaseHistory::class);
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
