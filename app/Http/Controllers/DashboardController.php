<?php

namespace App\Http\Controllers;

use App\Services\EmpresasService;
use App\Services\LeadsService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private readonly EmpresasService $empresasService;
    private readonly LeadsService $leadsService;
    function __construct(EmpresasService $empresasService, LeadsService $leadsService)
    {
        $this->empresasService = $empresasService;
        $this->leadsService = $leadsService;
    }
    public function index(){
        $empresaUsuario = $this->empresasService->buscarEmpresaUsuario(Auth::id());
        if(!$empresaUsuario->count() > 0){
            return redirect()->route('empresas');
        }
        $leads = $this->leadsService->buscaLeadsByIdEmpresa($empresaUsuario->empresas_id);
        $data = [
            'leads_hoje' => $leads->where('created_at', Carbon::today())->count(),

            'leads_semana' => $leads->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->count(),

            'leads_contato' => $leads->where('leads_prox_acao', 'ligar')->where('leads_prox_acao', 'whatsapp')->count(),
            'leads_fechado' => $leads->where('leads_acoes_id', 4)->count()
        ];
        return view('dashboard/index', ['empresaUsuario' => $empresaUsuario, 'leads' => $data]);
    }
}
