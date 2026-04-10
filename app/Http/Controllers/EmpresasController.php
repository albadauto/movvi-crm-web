<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Services\EmpresasService;
use App\Services\HistoricoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresasController extends Controller
{
    private readonly EmpresasService $empresasService;
    private readonly HistoricoService $historicoService;
    function __construct(EmpresasService $empresasService, HistoricoService $historicoService)
    {
        $this->empresasService = $empresasService;
        $this->historicoService = $historicoService;
    }
    public function index(){
        if(!$this->historicoService->usuarioPremium(Auth::id())){
            return redirect()->route('login');
        }
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
