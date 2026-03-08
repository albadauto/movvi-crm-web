<?php

namespace App\Services;

use App\Http\Requests\LeadsRequest;
use App\Models\Acoes;
use App\Models\Leads;
use Illuminate\Contracts\Session\Session;

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


}
