<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PagamentoService;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    private readonly PagamentoService $pagamentoService;
    function __construct(PagamentoService $pagamentoService)
    {
        $this->pagamentoService = $pagamentoService;
    }
    public function checkout(Request $request, $price_id, $plan_id)
    {
        $user = $request->user();
        $this->pagamentoService->UpdateUsuarioPlanId($user->id, $plan_id);
        return $user->newSubscription('default', $price_id)->checkout(
            [
                'success_url' => route('login'),
            ]);
    }
}
