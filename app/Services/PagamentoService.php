<?php

namespace App\Services;

use App\Models\User;

class PagamentoService
{
    public function UpdateUsuarioPlanId($userid, $plan_id){
        return User::where('id', $userid)->update([
            'plans_id' => $plan_id,
        ]);
    }
}
