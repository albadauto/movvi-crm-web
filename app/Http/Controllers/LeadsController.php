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
        $this->service->cadastrarLeads($request);
        return redirect()->route('leads');
    }

    public function mover(Request $request)
    {
        $lead = Leads::where('leads_id', $request->leadId)->first();
        if($lead){

            $lead->leads_acoes_id = $request->acaoId;
            $lead->save();
        }
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
