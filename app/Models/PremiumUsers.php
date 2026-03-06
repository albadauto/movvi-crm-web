<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PremiumUsers extends Model
{
    protected $table = 'premium_users';
    protected $primaryKey = 'premium_users_id';

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function plans(){
        return $this->belongsTo(Plans::class);
    }
    protected $fillable = [
        'premium_users_user_id',
        'premium_users_plan_id',
        'premium_users_next_payment',
        'premium_users_last_payment',
        'premium_users_is_active'
    ];
}
