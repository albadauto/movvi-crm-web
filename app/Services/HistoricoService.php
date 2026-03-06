<?php

namespace App\Services;

use App\Models\PurchaseHistory;

class HistoricoService
{
    public function criarHistorico($usuarioId, $planoId, $status){
        $data = ['purchase_history_plans_id' => $planoId,
            'purchase_history_status' => $status,
            'purchase_history_user_id' => $usuarioId];

        return PurchaseHistory::create($data);
    }

    public function usuarioPremium($usuarioId){
        return PurchaseHistory::where('purchase_history_user_id', $usuarioId)->where('purchase_history_status', 2)->first();
    }
}
