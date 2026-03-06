<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $table = 'plans';

    protected $primaryKey = 'plans_id';

    protected $fillable = [
        'plans_id',
        'plans_name',
        'plans_price',
        'plans_stripe_price_id',
    ];

    public function users(){
        return $this->hasOne(User::class);
    }

    public function premiumUsers(){
        return $this->hasOne(PremiumUsers::class);
    }

    public function purchaseHistory(){
        return $this->hasOne(PurchaseHistory::class);
    }

}
