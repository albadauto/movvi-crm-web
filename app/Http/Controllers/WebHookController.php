<?php

namespace App\Http\Controllers;

use App\Models\PremiumUsers;
use App\Models\User;
use App\Services\HistoricoService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \Laravel\Cashier\Http\Controllers\WebhookController as ControllersWebhookController;

class WebHookController extends ControllersWebhookController
{
    public function handlePaymentIntentSucceeded(array $payload)
    {
        $customerId = $payload['data']['object']['customer'];
        if (!$customerId) {
            Log::warning("Webhook PaymentIntent sem customer: " . json_encode($payload));
            return;
        }
        $user = User::where('stripe_id', $customerId)->first();
        Log::info("Atualização de Log:" . json_encode($payload));
        if ($user) {
            PremiumUsers::create([
                'premium_users_user_id' => $user->id,
                'premium_users_plan_id' => $user->plans_id,
                'premium_users_next_payment' => Carbon::now()->addMonth(),
                'premium_users_last_payment' => Carbon::now(),
                'premium_users_is_active' => true
            ]);
            $historicoService = new HistoricoService();
            $historicoService->criarHistorico($user->id, $user->plans_id, 2);
        }
    }
}
