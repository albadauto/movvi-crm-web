<?php

namespace App\Listeners;

use App\Models\PremiumUsers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StripeWebhookListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        \Log::info($event->type);
        $payload = $event->payload;
        if($payload['type'] == 'payment_intent.succeeded') {
            $customerId = $payload['data']['object']['customer'];
            $user = User::where('stripe_id', $customerId)->first();
            if($user) {
                PremiumUsers::create([
                    'premium_users_user_id' => $user->id,
                    'premium_users_plan_id' => $user->plan_id,
                    'premium_users_next_payment' => Carbon::now()->addMonth(),
                    'premium_users_last_payment' => Carbon::now(),
                    'premium_users_is_active' => true
                ]);
            }
        }
    }
}
