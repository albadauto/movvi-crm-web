<?php

namespace App\Services;

use App\Mail\EmailPadrao;
use App\Models\Otp;
use Illuminate\Support\Facades\Mail;

class EsqueciSenhaService
{
    public function enviaCodigoEmail($email){
        $codigo = random_int(100000, 999999);
        $this->insereCodigoOtp($email, $codigo);
        Mail::to($email)
            ->send(new EmailPadrao('Resetar senha', 'Não compartilhe o código com ninguém: '.$codigo));
    }

    private function insereCodigoOtp($email, $codigo){
        return Otp::create([
            'otp_email' => $email,
            'otp_code' => $codigo,
            'otp_is_active' => true,
            'otp_expiry_date' => now()->addDays(30),
        ]);
    }

    public function verificaOtp($email, $codigo){
        return Otp::where('otp_email', $email)->where('otp_code', $codigo)->where('otp_is_active', true)->first();
    }
}
