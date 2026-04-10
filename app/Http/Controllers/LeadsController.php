<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadsRequest;
use App\Models\Acoes;
use App\Models\Leads;
use App\Services\LeadsService;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    private readonly LeadsService $service;
    function __construct(LeadsService $service)
    {
        $this->service = $service;
    }
    public function index(){
        $leads = $this->service->buscaLeadsAcoes();
        return view('leads/index', ['acoes' => Acoes::all(), 'leads' => $leads]);
    }

    public function cadastro(){
        return view('leads/cadastro');
    }

    public function cadastrarLead(LeadsRequest $request){
        $leads = $this->service->buscaLeadsByIdEmpresa(session()->get('empresa_id'));
        $limiteLeads = $this->service->buscaLimiteLeads();
        if(count($leads) >= $limiteLeads && $limiteLeads != 0){
            return redirect()->route('leads')->with('error_leads', 'Erro: Limite de leads cadastrados atingido.
             Para cadastrar mais leads, selecione um plano superior ao atual.');
        }
        $this->service->cadastrarLeads($request);
        return redirect()->route('leads');
    }

    public function mover(Request $request)
    {
        $this->service->atualizarCard($request);
        return response()->json([
            'success' => true
        ]);
    }

    public function editar($id){
        $lead = $this->service->buscaLead($id);
        return view('leads/editar', ['lead' => $lead]);
    }

    public function deletarLead($id){
        $this->service->deletarLead($id);
        return redirect()->route('leads');
    }

    public function atualizarLead($id, LeadsRequest $request){
        $this->service->atualizarLeads($id, $request);
        return redirect()->route('leads');
    }

}
