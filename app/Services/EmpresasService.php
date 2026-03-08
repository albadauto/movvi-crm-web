<?php

namespace App\Services;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresas;
use Illuminate\Support\Facades\Auth;

class EmpresasService
{
    public function buscarEmpresaUsuario($userid){
        return Empresas::where('empresas_user_id',$userid)->first();
    }

    public function criarEmpresa(EmpresaRequest $request){
        if($request->file('empresas_logo')){
            $path = $request->file('empresas_logo')->store('logos', 'public');
            return Empresas::create([
                'empresas_logo' => $path,
                'empresas_nome' => $request->empresas_nome,
                'empresas_telefone' => $request->empresas_telefone,
                'empresas_cnpj' => $request->empresas_cnpj,
                'empresas_estado' => $request->empresas_estado,
                'empresas_cidade' => $request->empresas_cidade,
                'empresas_user_id' => Auth::id(),
            ]);
        }
        return null;
    }
}
