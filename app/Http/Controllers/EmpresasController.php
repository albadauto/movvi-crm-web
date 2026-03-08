<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Services\EmpresasService;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    private readonly EmpresasService $empresasService;
    function __construct(EmpresasService $empresasService)
    {
        $this->empresasService = $empresasService;
    }
    public function index(){
        return view('empresas/index');
    }

    public function criarEmpresa(EmpresaRequest $request){
        $retorno = $this->empresasService->criarEmpresa($request);
        if(!is_null($retorno)){
            session('empresa_id', $retorno->empresas_id);
            return redirect()->route('dashboard')->with('sucesso_criar_empresa', 'Empresa criada com sucesso!');
        }else{
            return redirect()->route('empresas')->with('erro', 'Ocorreu um erro ao salvar a empresa');
        }
    }
}
