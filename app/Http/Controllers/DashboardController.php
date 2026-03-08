<?php

namespace App\Http\Controllers;

use App\Services\EmpresasService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private readonly EmpresasService $empresasService;
    function __construct(EmpresasService $empresasService)
    {
        $this->empresasService = $empresasService;
    }
    public function index(){
        $empresaUsuario = $this->empresasService->buscarEmpresaUsuario(Auth::id());
        if(!$empresaUsuario->count() > 0){
            return redirect()->route('empresas');
        }
        return view('dashboard/index', ['empresaUsuario' => $empresaUsuario]);
    }
}
