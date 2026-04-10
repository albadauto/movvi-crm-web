<?php

namespace App\Services;

use App\Http\Requests\LeadsRequest;
use App\Models\Acoes;
use App\Models\Leads;
use App\Models\PremiumUsers;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadsService
{
    public function cadastrarLeads(LeadsRequest $request){
        $data = [
            'leads_nome' => $request->leads_nome,
            'leads_email' => $request->leads_email,
            'leads_whatsapp' => $request->leads_whatsapp,
            'leads_cpf' => $request->leads_cpf,
            'leads_empresa_id' => session()->get('empresa_id'),
            'leads_acoes_id' => Acoes::orderBy('acoes_id', 'asc')->first()->acoes_id,

        ];
        return Leads::create($data);
    }

    public function buscaLeadsAcoes(){
        $empresaid = session()->get('empresa_id');
        return Leads::with('acoes')->where('leads_empresa_id', $empresaid)->get();
    }

    public function buscaLead($id){
        return Leads::where('leads_id', '=', $id)->first();
    }

    public function atualizarCard(Request $request){
        $lead = Leads::where('leads_id', $request->leadId)->first();
        if($lead){
            $lead->leads_acoes_id = $request->acaoId;
            $lead->leads_prox_acao = null;
            $lead->leads_prox_acao_data = null;
            $lead->leads_prox_acao_hora = null;
            $lead->save();

        }
    }

    public function deletarLead($id){
        return Leads::destroy($id);
    }

    public function buscaLimiteLeads(){
        $premiumUser = PremiumUsers::where('premium_users_user_id', Auth::id())->first();
        if(!is_null($premiumUser)){
            if($premiumUser->premium_users_plan_id == 1)
                return 10;
            if($premiumUser->premium_users_plan_id == 2)
                return 100;
            if($premiumUser->premium_users_plan_id == 3)
                return 0;
        }
    }

    public function buscaLeadsByIdEmpresa($idEmpresa){
        return Leads::where('leads_empresa_id', $idEmpresa)->get();
    }

    public function atualizarLeads($id, LeadsRequest $request){
        $lead = $this->buscaLead($id);
        $lead->leads_nome = $request->leads_nome;
        $lead->leads_email = $request->leads_email;
        $lead->leads_whatsapp = $request->leads_whatsapp;
        $lead->leads_cpf = $request->leads_cpf;
        $lead->leads_prox_acao = $request->leads_prox_acao;
        $lead->leads_prox_acao_data = $request->leads_prox_acao_data;
        $lead->leads_prox_acao_hora = $request->leads_prox_acao_hora;
        return $lead->save();
    }


}
