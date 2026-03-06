<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    protected $table = 'purchase_history';
    protected $primaryKey = 'purchase_history_id';
    protected $fillable = [
        'purchase_history_id',
        'purchase_history_user_id',
        'purchase_history_plans_id',
        'purchase_history_status'
    ];
    public function plans(){
        return $this->belongsTo(Plans::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }

}
