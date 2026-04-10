<?php

namespace App\Services;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Empresas;
use App\Models\PremiumUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    public function criarUsuario(CreateUserRequest $request){
        return User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
        ]);
    }

    public function LogarUsuario(LoginRequest $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $empresa = Empresas::where('empresas_user_id', Auth::id())->first();
            if(!is_null($empresa)){
                session()->put('empresa_id', $empresa->empresas_id);
            }
            return true;
        }
        return false;
    }
    public function buscaUsuarioEmail($email){
        return User::where('email', $email)->first();
    }

    public function atualizarSenha($email, $senha){
        return User::where('email', $email)->update(['password' => Hash::make($senha)]);
    }
}
