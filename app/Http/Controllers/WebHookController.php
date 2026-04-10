<?php

namespace App\Http\Controllers;

use App\Models\Plans;
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
    public function handleCustomerSubscriptionDeleted(array $payload)
    {
        $subscriptionId = $payload['data']['object']['id'];

        $premium = PremiumUsers::where('stripe_subscription_id', $subscriptionId)->first();

        if ($premium) {
            $premium->update([
                'premium_users_is_active' => false
            ]);
        }
    }
    public function handleCustomerSubscriptionUpdated(array $payload)
    {
        $object = $payload['data']['object'];
        $customerId = $payload['data']['object']['customer'];

        $priceId = $object['items']['data'][0]['price']['id'] ?? null;
        $user = User::where('stripe_id', $customerId)->first();
        Log::info("Atualização de Log:" . json_encode($payload));
        Log::info("Customer: " . json_encode($customerId));
        $plan = Plans::where('plans_stripe_price_id', $priceId)->first();
        Log::info("Plan: " . json_encode( $plan));

        if ($user) {
            $user->update([
                'plans_id' => $plan->plans_id
            ]);

            Log::info("Atualizado com sucesso: " . json_encode( $user));

        }
    }
}
